<?php

namespace pbgroupeu\gettingnote_eu\Controller\Brilius;

use pbgroupeu\stacer_eu\Controller\AbstractFrontendController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\Response\RedirectResponse;

// Constructor prerequisites
use Doctrine\ORM\EntityManagerInterface;
use Twig\Environment;
use League\Config\Configuration;

// Session
use pbgroupeu\gettingnote_eu\Controller\Krugman\SessionTrait;

class ProcessEconomics extends AbstractFrontendController implements ProcessEconomicsInterface
{
  use SessionTrait;

  /**
     * Contructor
     *
     * @param Configuration $eniac
     * @param Environment $twig
     * @param EntityManagerInteface $emn
     * @param \Session $session
   */
  public function __construct(Environment $twig, Configuration $eniac,
    EntityManagerInterface $emn,
    \Session $session)
  {
    parent::__construct($twig, $eniac, $emn);
    $this->session = $session;
  }

  /**
     * @inheritdoc
   */
  public function home(ServerRequestInterface $request): ResponseInterface
  {
    $session = $this->session;

    if (!$session->getOrDefault('authenticated', false)) {
      return new RedirectResponse('/index.php/redirected/guest');
    }

    if (in_array('administrator', $session->get('roles'))) {
      return new RedirectResponse('/index.php/admin/dashboard/basics-ETL');
    } elseif (in_array('user', $session->get('roles'))) {
      return new RedirectResponse('/index.php/user/dashboard/basics-ETL');
    }
  }

  /**
     * @inheritdoc
   */
  public function guest(ServerRequestInterface $request): ResponseInterface
  {
    $session = $this->session;

    if ($session->getOrDefault('authenticated', false)) {
      return new RedirectResponse('/index.php/redirected/home');
    }

    $twig = $this->twig;
    $template = $twig->load('@brilius/guest.html.twig');

    $response = new Response();
    $response->getBody()->write($template->render());

    return $response;
  }

}
