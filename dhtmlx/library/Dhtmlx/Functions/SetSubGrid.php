<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetSkin extends InitFunction implements Functions {
    const EXPRESSION = "%s.setSkin(%s,%s,%s);";

    /**
     * @var null the subgrid object
     */
    public $subgrid = null;

    /**
     * @var int the column of the main grid, which should contain the subgrid
     */
    public $sInd = 0;

    /**
     * @var int the column of the subgrid, its value will be displayed in the main grid cell
     */
    public $tInd = 0;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->subgrid, $this->sInd, $this->tInd) . PHP_EOL;
    }
} 