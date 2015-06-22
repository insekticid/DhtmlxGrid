<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class EnableAutoWidth extends InitFunction implements Functions {
    const EXPRESSION = "%s.enableAutoWidth(%s,%s,%s);";

    /**
     * @var bool true/false
     */
    public $mode = true;

    /**
     * @var int max allowed width, not limited by default
     */
    public $max_limit = 0;

    /**
     * @var int min allowed width, not limited by default
     */
    public $min_limit = 0;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, var_export($this->mode, true), $this->max_limit, $this->min_limit) . PHP_EOL;
    }
} 