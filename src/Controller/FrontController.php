<?php

namespace Controller;

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
        switch($action){
            case "page.show":
                $controller = new PageController();
                $controller->show();
                break;

            case "page.index":
                $controller = new PageController();
                $controller->index();
                break;

            default:
                echo "It works!";
                break;
        }
    }
}
