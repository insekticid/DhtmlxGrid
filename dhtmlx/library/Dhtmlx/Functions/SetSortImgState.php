<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetSortImgState extends InitFunction implements Functions {
    const EXPRESSION = "%s.setSortImgState(%s,%s,'%s',%s);";

    const ORDER_ASC = "asc";
    const ORDER_DESC = "desc";

    public $state = true;

    public $colId = 0;

    public $row = 0;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, var_export($this->state,true), $this->colId, $this->order, $this->row) . PHP_EOL;
    }
} 