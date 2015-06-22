<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class GetCustomCombo extends InitFunction implements Functions {
    const EXPRESSION = "%s.getCustomCombo(%s,%s);";

    public $row_id = 0;

    /**
     * @var int column index (the cell must have 'co', 'coro' or 'combo' type)
     */
    public $col_ind = 0;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->row_id, $this->col_ind) . PHP_EOL;
    }
} 