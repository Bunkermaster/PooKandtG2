<?php

namespace Controller;

use Controller\PageController;

/**
 * Class FrontController
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Controller
 */
class FrontController
{
    public function __construct()
    {
        $action = $_POST[\KANDT_ACTION_PARAM] ?? $_GET[\KANDT_ACTION_PARAM] ?? '';
        $controllerName = "Controller\PageController";
        $controller = new $controllerName();

        switch($action){
            case "page.show":
                $controller->show();
                break;

            case "page.index":
                $controller->index();
                break;

            case "page.edit":
                $controller->edit();
                break;

            case "page.add":
                $controller->add();
                break;

            case "page.delete":
                $controller->delete();
                break;

            default:
                echo "It works!";
                break;
        }
    }
}
