<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class EnableAlterCss extends InitFunction implements Functions {
    const EXPRESSION = "%s.enableAlterCss(%s,%s,%s,%s);";

    /**
     * @var null name of css class for even rows
     */
    public $cssE = null;

    /**
     * @var null name of css class for odd rows
     */
    public $cssU = null;

    /**
     * @var bool true/false - mark rows not by order, but by level in treegrid (optional, default value: true - treeGrid, false - Grid)
     */
    public $perLevel = true;

    /**
     * @var bool true/false - creates additional unique css class based on the row level (optional, false by default)
     */
    public $levelUnique = true;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->cssE, $this->cssU, var_export($this->perLevel, true), var_export($this->levelUnique, true)) . PHP_EOL;
    }
} 