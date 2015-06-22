<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class GetFooterLabel extends InitFunction implements Functions {
    const EXPRESSION = "%s.getFooterLabel(%s,%s);";

    public $col_id = 0;

    /**
     * @var int footer row index (optional, 0 by default)
     */
    public $row_id = 0;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->col_id, $this->row_id) . PHP_EOL;
    }
} 