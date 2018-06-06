<?php

namespace Helper;

/**
 * Class AbstractController
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Helper
 */
abstract class AbstractController
{
    /**
     * @var AbstractModel
     */
    protected $model;

    /**
     * @var OSEF
     */
    protected $view;

}