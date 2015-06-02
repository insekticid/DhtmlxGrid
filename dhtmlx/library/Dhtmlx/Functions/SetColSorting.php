<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetColSorting implements Functions {
    const EXPRESSION = "%s.setColSorting('%s');";

    /**
     * Sort integer
     */
    const SORT_INT = "int";

    /**
     * Sort date
     */
    const SORT_DATE = "date";

    /**
     * Sort string
     */
    const SORT_STR = "str";

    /**
     * No sort
     */
    const SORT_NA = "na";

    public $sort = array();

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, implode(",", $this->sort)) . PHP_EOL;
    }
} 