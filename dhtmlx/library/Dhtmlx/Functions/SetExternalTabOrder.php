<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetExternalTabOrder extends InitFunction implements Functions {
    const EXPRESSION = "%s.setExternalTabOrder(%s,%s);";

    /**
     * @var null html object or its id - gets focus when tab+shift are pressed in the first cell
     */
    public $start = null;

    /**
     * @var null html object or its id - gets focus when tab is pressed in the last cell
     */
    public $end = null;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->start, $this->end) . PHP_EOL;
    }
} 