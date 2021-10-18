<?php

namespace pbgroupeu\gettingnote_eu\Controller\Krugman;

use pbgroupeu\stacer_eu\Controller\AbstractFrontendController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\Response\RedirectResponse;

// Constructor prerequisites
use Doctrine\ORM\EntityManagerInterface;
use Twig\Environment;
use League\Config\Configuration;

// Entity economics
use pbgroupeu\stacer_eu\Entity\User;

class Economics extends AbstractFrontendController implements EconomicsInterface
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
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
   */
  public function login(ServerRequestInterface $request): ResponseInterface
  {
    $session = $this->session;

    if ($session->getOrDefault('authenticated', false)) {
      return new RedirectResponse('/index.php/redirected/home');
    }
    $twig = $this->twig;
    $template = $twig->load('@krugman/login.html.twig');

    $response = new Response();
    $response->getBody()->write($template->render());

    return $response;
}

  /**
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     * @todo implement logout process
   */
  public function logout(ServerRequestInterface $request): ResponseInterface
  {
    $session = $this->session;

    if (!$session->getOrDefault('authenticated', false)) {
      return new RedirectResponse('/index.php/redirected/guest');
    }
    $session = $this->session;

    $session->clear();
    $session->destroy();

    $session->commit();

    return new RedirectResponse('/index.php/redirected/guest');
  }

  /**
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     * @todo implement logout process
   */
  public function register(ServerRequestInterface $request): ResponseInterface
  {
  }

  /**
     * Login stub
     *
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     * @todo implement processing login process
   */
  public function processLogin(ServerRequestInterface $request): ResponseInterface
  {
    $emn = $this->emn;

    $user = $emn->getRepository(User::class)->findOneBy([
      'email' => $request->getParsedBody()['email'],
      'hash' => hash('sha1', $request->getParsedBody()['hash'])
    ]);

    switch (!is_null($user) && is_a($user, User::class)) {
      case true:
        $session = $this->session;
        $session->set('email', $user->getEmail());
        $session->set('roles', $user->getRoles());
        $session->set('authenticated', true);

        $session->commit();

        return new RedirectResponse('/index.php/redirected/home');

        break;
      default:
        throw new \Exception('Not authenticated!');
        break;
    }
  }

  /**
     * Login stub
     *
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     * @todo implement processing login process
   */
  public function processRegister(ServerRequestInterface $request): ResponseInterface
  {

  }

}
