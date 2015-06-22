<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class AttachToObject extends InitFunction implements Functions {
    const EXPRESSION = "%s.attachToObject(%s);";

    public $obj;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->obj) . PHP_EOL;
    }
} 