<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetTabOrder extends InitFunction implements Functions {
    const EXPRESSION = "%s.setTabOrder('%s');";

    /**
     * @var array a list of tab indexes
     */
    public $order = array();

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, implode(",", $this->order)) . PHP_EOL;
    }
} 