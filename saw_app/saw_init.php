<?php

define('APPROOT', __DIR__ . '/');
define('CONFIG_SAW', APPROOT . 'saw_config/');
define('CONTROLLER_SAW', APPROOT . 'saw_controllers/');
define('MODEL_SAW', APPROOT . 'saw_models/');
define('CORE_SAW', APPROOT . 'saw_core/');
define('VIEW_SAW', APPROOT . 'saw_views/');

require_once CONFIG_SAW . 'saw_config.php';

require_once CORE_SAW . 'SAW_Route.php';
require_once CORE_SAW . 'SAW_Controller.php';
require_once CORE_SAW . 'SAW_Database.php';
require_once CORE_SAW . 'SAW_Alert.php';


