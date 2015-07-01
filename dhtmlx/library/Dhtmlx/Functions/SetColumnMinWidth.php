<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetColumnMinWidth extends InitFunction implements Functions {
    const EXPRESSION = "%s.setColumnMinWidth(%s,%s);";

    public $width = 0;
    public $id = 0;

    public static $_instance;

    public function __construct() {
        self::$_instance = $this;
    }

    public static function getInstance()
    {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function render()
    {
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->width, $this->id) . PHP_EOL;
    }
} 