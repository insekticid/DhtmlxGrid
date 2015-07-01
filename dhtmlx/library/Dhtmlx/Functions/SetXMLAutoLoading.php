<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetXMLAutoLoading extends InitFunction implements Functions {
    const EXPRESSION = "%s.setXMLAutoLoading('%s',%s);";

    /**
     * @var null url to the external file
     */
    public $url = null;

    /**
     * @var int count of rows requested from server by single operation
     */
    public $buffer = 0;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->url, $this->buffer) . PHP_EOL;
    }
} 