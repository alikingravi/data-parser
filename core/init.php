<?php

include_once('../AutoLoader.php');
AutoLoader::registerDirectory('../classes');

require_once '../app/controllers/DataController.php';

DataController::index();