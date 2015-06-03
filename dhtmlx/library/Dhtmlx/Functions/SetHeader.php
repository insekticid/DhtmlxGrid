<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetHeader extends InitFunction implements Functions {
    const EXPRESSION = "%s.setHeader('%s',null,%s);";

    public $headers = array();
    public $aligns = array();

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, implode(",", $this->headers), json_encode($this->aligns)) . PHP_EOL;
    }
} 