<?php

namespace Controller;

use Helper\AbstractController;
use View\UserView;

/**
 * Class UserController
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Controller
 */
class UserController extends AbstractController
{
    public function __construct()
    {
        $this->view = new UserView();
    }

    public function nameManager()
    {
        if (\session_status() === \PHP_SESSION_ACTIVE && isset($_SESSION['name'])){
            return "Bonjour, ".$_SESSION['name'];
        } else {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user'])) {
                // process HTTP request form data
                $data = $_POST['user'];
                // model update method call
                $_SESSION['name'] = $data['name'];
                header("Location: ".\KANDT_ROOT_URI.\KANDT_ACTION_PARAM."=".\KANDT_DEFAULT_ROUTE);
                exit();
            }
            return $this->view->form();
        }
    }

    public function logout()
    {
        \session_destroy();
        header("Location: ".\KANDT_ROOT_URI.\KANDT_ACTION_PARAM."=".\KANDT_DEFAULT_ROUTE);
        exit();
    }

}