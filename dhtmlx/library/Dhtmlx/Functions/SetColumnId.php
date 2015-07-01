<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetColumnId extends InitFunction implements Functions {
    const EXPRESSION = "%s.setColumnId(%s,%s);";

    public $ind = 0;
    public $newId = 0;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->ind, $this->newId) . PHP_EOL;
    }
} 