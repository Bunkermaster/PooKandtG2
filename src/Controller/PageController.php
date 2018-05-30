<?php

namespace Controller;

use Model\PageModel;
use View\PageView;

/**
 * Class PageController
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Controller
 */
class PageController
{
    private $model;
    private $view;

    /**
     * PageController constructor.
     */
    public function __construct()
    {
        $this->model = new PageModel();
        $this->view = new PageView();
    }

    public function index()
    {
        $this->view->index($this->model->findAll());
    }

    public function show()
    {

    }

    public function delete()
    {

    }

    public function add()
    {

    }

    public function edit()
    {

    }
}