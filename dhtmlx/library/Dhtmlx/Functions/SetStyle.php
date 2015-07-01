<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetSkin extends InitFunction implements Functions {
    const EXPRESSION = "%s.setSkin(%s,%s,%s,%s);";

    /**
     * @var null style def. expression for the header
     */
    public $ss_header = null;

    /**
     * @var null style def. expression for grid cells
     */
    public $ss_grid = null;

    /**
     * @var null style def. expression for the selected cell
     */
    public $ss_selCell = null;

    /**
     * @var null style def. expression for the selected row
     */
    public $ss_selRow = null;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->ss_header, $this->ss_grid, $this->ss_selCell, $this->ss_selRow) . PHP_EOL;
    }
} 