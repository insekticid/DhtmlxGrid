<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SelectCell extends InitFunction implements Functions {
    const EXPRESSION = "%s.selectCell(%s,%s,%s,%s,%s);";

    /**
     * @var mixed row object or row index
     */
    public $rId = 0;

    /**
     * @var mixed cell index
     */
    public $cId = 0;

    /**
     * @var bool preserve previously selected rows, true/false (optional, false by default). Multi select mode should be enabled.
     */
    public $preserve = false;

    /**
     * @var bool switch selected cell to the edit mode (optional, false by default)
     */
    public $edit = false;

    /**
     * @var bool true/false - scroll row to view (optional, true by default)
     */
    public $show = true;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->rId, $this->cId, var_export($this->preserve, true), var_export($this->edit, true), var_export($this->show, true)) . PHP_EOL;
    }
} 