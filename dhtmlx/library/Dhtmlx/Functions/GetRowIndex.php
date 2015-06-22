<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class GetRowIndex extends InitFunction implements Functions {
    const EXPRESSION = "%s.getRowIndex(%s);";

    public $row_id = 0;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->row_id) . PHP_EOL;
    }
} 