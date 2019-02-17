<?php

use Travianz\Mvc\FrontController;

define("PUBLIC_FOLDER_NAME",'public');
define("ROOT_DIR", str_replace(PUBLIC_FOLDER_NAME, '', __DIR__));
define("TEMPLATES_DIR", ROOT_DIR . 'templates' . DIRECTORY_SEPARATOR);
define("ASSETS_DIR", ROOT_DIR . 'assets' . DIRECTORY_SEPARATOR);
define("CONFIG_DIR", ROOT_DIR . 'config' . DIRECTORY_SEPARATOR);
define("SRC_DIR", ROOT_DIR . 'src' . DIRECTORY_SEPARATOR);
define("VENDOR_DIR", ROOT_DIR . 'vendor' . DIRECTORY_SEPARATOR);
define("MODELS_NAMESPACE",'Travianz' . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR);
define("VIEWS_NAMESPACE",'Travianz' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR);
define("CONTROLLERS_NAMESPACE",'Travianz' . DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR);

require VENDOR_DIR . 'autoload.php';
require SRC_DIR . 'Languages' . DIRECTORY_SEPARATOR . 'English' . DIRECTORY_SEPARATOR . 'English.php';

$frontController = new FrontController();
$frontController->executeAction();
