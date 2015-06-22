<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class ForEachRowInGroup extends InitFunction implements Functions {
    const EXPRESSION = "%s.forEachRowInGroup(%s,function(id){%s});";

    /**
     * @var string null name of the group
     */
    public $name = null;

    /**
     * @var  Create javascript function with string. Assignature function: function(id){}
     */
    public $custom_code;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->name, $this->custom_code) . PHP_EOL;
    }
} 