<?php

use Travianz\Mvc\FrontController;

define("PUBLIC_FOLDER_NAME",'public');
define("ROOT_DIR", str_replace(PUBLIC_FOLDER_NAME, '', __DIR__));
define("TEMPLATES_DIR", ROOT_DIR . 'templates' . DIRECTORY_SEPARATOR);
define("ASSETS_DIR", ROOT_DIR . 'assets' . DIRECTORY_SEPARATOR);
define("CONFIG_DIR", ROOT_DIR . 'config' . DIRECTORY_SEPARATOR);
define("SRC_DIR", ROOT_DIR . 'src' . DIRECTORY_SEPARATOR);
define("VENDOR_DIR", ROOT_DIR . 'vendor' . DIRECTORY_SEPARATOR);
define("MODELS_NAMESPACE","Travianz\\Models\\");
define("VIEWS_NAMESPACE","Travianz\\Views\\");
define("CONTROLLERS_NAMESPACE","Travianz\\Controllers\\");

require VENDOR_DIR . 'autoload.php';
require SRC_DIR . 'Languages\English.php';

$frontController = new FrontController();
$frontController->executeAction();
