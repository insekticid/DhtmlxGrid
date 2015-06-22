<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SelectRowById extends InitFunction implements Functions {
    const EXPRESSION = "%s.selectRowById(%s,%s,%s,%s);";

    /**
     * @var mixed row object or row index
     */
    public $rId = 0;

    /**
     * @var bool preserve previously selected rows, true/false (optional, false by default). Multi select mode should be enabled.
     */
    public $preserve = false;

    /**
     * @var bool true/false - scroll row to view (optional, true by default)
     */
    public $show = true;

    /**
     * @var bool if true - call the onRowSelect function (optional, false by default)
     */
    public $call = false;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->rId, var_export($this->preserve, true), var_export($this->show, true), var_export($this->call, true)) . PHP_EOL;
    }
} 