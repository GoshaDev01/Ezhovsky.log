<?php

namespace src\Controllers;

use View; // Добавить импорт

class MainController
{
    public $view;
    public $layout = 'default'; // Исправлено: было defoult -> default
    
    public function __construct() {
        $this->view = new View($this->layout);
    }
    
    public function main() {
        $this->view->renderHTML('main/main.php');
    }

    public function sayHello($name)
    {
        echo 'Привет, ' . $name;
    }
}