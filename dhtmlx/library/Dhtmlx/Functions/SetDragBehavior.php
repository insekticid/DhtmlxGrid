<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetDragBehavior extends InitFunction implements Functions {
    const EXPRESSION = "%s.setDragBehavior(%s);";

    const MODE_CHILD = "child";
    const MODE_SIBLING = "sibling";
    const MODE_COMPLEX = "complex";
    const MODE_SIBLING_NEXT = "sibling-next";
    const MODE_COMPLEX_NEXT = "complex-next";

    public $mode = self::MODE_SIBLING;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->mode) . PHP_EOL;
    }
} 