<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetCheckedRows extends InitFunction implements Functions {
    const EXPRESSION = "%s.setCheckedRows(%s,%s);";

    public $col_id = 0;

    /**
     * @var int value, 0 - not checked, any other value - checked
     */
    public $v = 0;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->col_id, $this->v) . PHP_EOL;
    }
} 