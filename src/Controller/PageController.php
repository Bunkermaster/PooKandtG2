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

    }

    /**
     *
     */
    public function add()
    {

    }

    /**
     *
     */
    public function edit()
    {
        // test HTTP method
        // if POST
            // process HTTP request form data
            // model update method call
        // else
        // get data to edit
        if (!isset($_GET['id']) && !isset($_POST['id'])) {
            throw new \Exception("id param doesn't exist");
        }
        $data = $this->model->find($_GET['id'] ?? $_POST['id'] ?? 0);
        // display form
        $this->view->edit($data);
    }
}