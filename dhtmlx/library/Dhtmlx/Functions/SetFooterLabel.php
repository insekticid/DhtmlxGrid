<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetFooterLabel extends InitFunction implements Functions {
    const EXPRESSION = "%s.setFooterLabel(%s,%s,%s);";

    public $colId = 0;

    public $label = null;

    public $rowId = 1;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->colId, $this->label, $this->rowId) . PHP_EOL;
    }
} 