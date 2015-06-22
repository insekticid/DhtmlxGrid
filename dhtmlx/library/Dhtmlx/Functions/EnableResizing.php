<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class EnableResizing extends InitFunction implements Functions {
    const EXPRESSION = "%s.enableResizing('%s);";

    /**
     * @var array disable resizing of the first column Ex: array(false,true,true,true,true,true,true)
     */
    public $list = array();

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, implode(",", $this->list)) . PHP_EOL;
    }
} 