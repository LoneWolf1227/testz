<?php
spl_autoload_register(function ($class_name) {
    $classes_path = './includes/classes/' . $class_name . '.php';

    $db = str_replace('\\','/', $class_name);
    $db_path = './includes/' . $db .'.php';

    $model = str_replace('\\','/', $class_name);
    $models_path = './includes/' . $model . '.php';

    $controllers_path = './includes/Controllers/' . $class_name . '.php';

    if (file_exists($classes_path)) {
        require_once $classes_path;
    } elseif (file_exists($controllers_path)) {
        require_once $controllers_path;
    } elseif (file_exists($models_path)) {
        require_once $models_path;
    }elseif (file_exists($db_path)) {
        require_once $db_path;
    }
});

require_once 'Routes.php';