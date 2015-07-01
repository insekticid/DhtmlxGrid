<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SortRows extends InitFunction implements Functions {
    const EXPRESSION = "%s.sortRows(%s,'%s','%s');";

    const SORT_STR = "str";
    const SORT_INT = "int";
    const SORT_DATE = "date";

    const ORDER_ASC = "asc";
    const ORDER_DESC = "desc";

    public $colId = 0;

    public $type = self::SORT_STR;

    public $order = self::ORDER_ASC;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->colId, $this->type, $this->order) . PHP_EOL;
    }
} 