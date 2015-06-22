<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetCSVDelimiter extends InitFunction implements Functions {
    const EXPRESSION = "%s.setCSVDelimiter(%s);";

    /**
     * @var string the delimiter used in CSV operations, comma by default (only single char delimiters allowed)
     */
    public $str = ',';

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->str) . PHP_EOL;
    }
} 