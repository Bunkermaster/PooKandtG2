<?php

namespace Controller;

use Helper\AbstractController;
use Model\PageModel;
use View\PageView;

/**
 * Class PageController
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Controller
 */
class PageController extends AbstractController
{

    /**
     * PageController constructor.
     */
    public function __construct()
    {
        $this->model = new PageModel();
        $this->view = new PageView();
    }

    /**
     *
     */
    public function index()
    {
        $this->view->index($this->model->findAll());
    }

    /**
     *
     */
    public function show()
    {

    }

    /**
     *
     */
    public function delete()
    {
        // test HTTP method
        // if POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['page'])) {
            // process HTTP request form data
            $data = $_POST['page'];
            // model update method call
            $this->model->delete($data['id']);
            header("Location: ".\KANDT_ROOT_URI.\KANDT_ACTION_PARAM."=".\KANDT_DEFAULT_ROUTE);
            exit();
        }
        // else
        // get data to edit
        if (!isset($_GET['id']) && !isset($_POST['id'])) {
            throw new \Exception("id param doesn't exist");
        }
        $data = $this->model->find($_GET['id'] ?? $_POST['id'] ?? 0);
        // display form
        $this->view->delete($data);

    }

    /**
     *
     */
    public function add()
    {
        // secure data
        if (!isset($_POST['page'])) {
            throw new \Exception('Form data not found');
        }
        // get form data
        $data = $_POST['page'];
        // insert form data
        $id = $this->model->add($data);
        if (is_null($id)) {
            throw new \Exception('Insertion failed');
        }
        // redirect to index
        header("Location: ".\KANDT_ROOT_URI.\KANDT_ACTION_PARAM."=".\KANDT_DEFAULT_ROUTE);
        exit();
    }

    /**
     *
     */
    public function edit()
    {
        // test HTTP method
        // if POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['page'])) {
            // process HTTP request form data
            $data = $_POST['page'];
            // model update method call
            $this->model->edit($data);
            header("Location: ".\KANDT_ROOT_URI.\KANDT_ACTION_PARAM."=".\KANDT_DEFAULT_ROUTE);
            exit();
        }
        // else
        // get data to edit
        if (!isset($_GET['id']) && !isset($_POST['id'])) {
            throw new \Exception("id param doesn't exist");
        }
        if(!isset($data)){
            $data = $this->model->find($_GET['id'] ?? $_POST['id'] ?? 0);
        }
        // display form
        $this->view->edit($data);
    }
}