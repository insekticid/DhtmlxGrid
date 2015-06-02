<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetColAlign implements Functions {
    const EXPRESSION = "%s.setColAlign('%s');";

    /**
     * Align Left
     */
    const ALIGN_LEFT = "left";

    /**
     * Align Left
     */
    const ALIGN_RIGHT = "right";

    /**
     * Align Left
     */
    const ALIGN_CENTER = "center";

    public $aligns = array();

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, implode(",", $this->aligns)) . PHP_EOL;
    }
} 