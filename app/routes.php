<?php

use \App\Controllers\HomeController;


$app->get('/users/{id}', HomeController::class . ':index');