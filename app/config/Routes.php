<?php

require_once SRC_PATH . '/classes/Joaquim.php';
require_once SRC_PATH . '/controller/ArtigosController.php';

Joaquim::get('home', [ArtigosController::class, 'index'], 'ArtigosView');
