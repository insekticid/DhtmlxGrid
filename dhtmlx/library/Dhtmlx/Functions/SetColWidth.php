<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetColWidth extends InitFunction implements Functions {
    const EXPRESSION = "%s.setColWidth(%s,%s);";

    public $col_id = 0;

    public $value = 0;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->col_id, $this->value) . PHP_EOL;
    }
} 