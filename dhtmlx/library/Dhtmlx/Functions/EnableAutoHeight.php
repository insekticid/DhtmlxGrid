<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class EnableAutoHeight extends InitFunction implements Functions {
    const EXPRESSION = "%s.enableAutoHeight(%s,%s,%s);";

    /**
     * @var bool true/false
     */
    public $mode = true;

    /**
     * @var int maximum height before scrolling appears (no limit by default)
     */
    public $maxHeight = 0;

    /**
     * @var bool control usage of maxHeight param:if true,all grid height included in max height calculation,if false(default)-only data part(no header)of the grid included in it
     */
    public $countFullHeight = true;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, var_export($this->mode, true), $this->maxHeight, var_export($this->countFullHeight, true)) . PHP_EOL;
    }
} 