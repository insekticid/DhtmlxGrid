<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class ForceFullLoading extends InitFunction implements Functions {
    const EXPRESSION = "%s.forceFullLoading(%s);";

    /**
     * @var int size of data which will be loaded by single iteration, optional, 50 rows by default
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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->buffer) . PHP_EOL;
    }
} 