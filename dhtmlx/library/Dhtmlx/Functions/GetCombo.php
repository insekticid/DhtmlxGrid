<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class GetCombo extends InitFunction implements Functions {
    const EXPRESSION = "%s.getCombo(%s);";

    public $cid = 0;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->cid) . PHP_EOL;
    }
} 