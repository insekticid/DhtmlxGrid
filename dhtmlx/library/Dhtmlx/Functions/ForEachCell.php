<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class ForEachCell extends InitFunction implements Functions {
    const EXPRESSION = "%s.forEachCell(%s,function(cellObj,ind){%s});";

    public $rowId = 0;

    /**
     * @var function which gets eXcell object as incoming argument. Assignature: function(cellObj,ind){}
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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->rowId, $this->custom_code) . PHP_EOL;
    }
} 