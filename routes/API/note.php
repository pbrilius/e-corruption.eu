<?php

use pbgroupeu\gettingnote_eu\Controller\API\NoteController;

// Note interpolation
$router->get('/note/{id:number}', [$container->get(NoteController::class), 'get']);
$router->get('/note', [$container->get(NoteController::class), 'getList']);
$router->put('/note/{id:number}', [$container->get(NoteController::class), 'update']);
$router->patch('/note/{id:number}', [$container->get(NoteController::class), 'patch']);
$router->delete('/note/{id:number}', [$container->get(NoteController::class), 'delete']);
$router->post('/note', [$container->get(NoteController::class), 'create']);
