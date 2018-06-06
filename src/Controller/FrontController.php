<?php

namespace Controller;

use Controller\PageController;
use Controller\UserController;

/**
 * Class FrontController
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Controller
 */
class FrontController
{
    public function __construct()
    {
        \session_start();
        $action = $_POST[\KANDT_ACTION_PARAM] ?? $_GET[\KANDT_ACTION_PARAM] ?? '';
        $userController = new UserController();
        switch($action){
            case "page.show":
                $controller = new PageController();
                $output = $controller->show();
                break;

            case "page.index":
                $controller = new PageController();
                $output = $controller->index();
                break;

            case "page.edit":
                $controller = new PageController();
                $output = $controller->edit();
                break;

            case "page.add":
                $controller = new PageController();
                $output = $controller->add();
                break;

            case "page.delete":
                $controller = new PageController();
                $output = $controller->delete();
                break;

            case "user.manager":
                $output = $userController->nameManager();
                break;

            case "user.logout":
                $output = $userController->logout();
                break;

            default:
                $output = "It works!";
                break;
        }
        echo $userController->nameManager();
        echo $output;
    }
}
