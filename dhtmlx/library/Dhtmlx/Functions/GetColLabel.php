<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class GetColLabel extends InitFunction implements Functions {
    const EXPRESSION = "%s.getColLabel(%s);";

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->id) . PHP_EOL;
    }
} 