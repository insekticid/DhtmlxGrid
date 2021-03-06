<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class CopyRowContent extends InitFunction implements Functions {
    const EXPRESSION = "%s.copyRowContent(%s,%s);";

    public $from_row = null;
    public $to_row_id = null;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->from_row, $this->to_row_id) . PHP_EOL;
    }
} 