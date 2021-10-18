<?php

use pbgroupeu\getnote_eu\Controller\MembershipController;

$router->get('/membership-status', [$container->get(MembershipController::class), 'membershipStatus']);
