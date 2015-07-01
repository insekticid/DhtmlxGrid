<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetSkin extends InitFunction implements Functions {
    const EXPRESSION = "%s.setSkin('%s');";

    const TYPE_XP = "xp";
    const TYPE_MT = "mt";
    const TYPE_GRAY = "gray";
    const TYPE_LIGHT = "light";
    const TYPE_CLEAR = "clear";
    const TYPE_MODERN = "modern";
    const TYPE_SB_DARK = "sb_dark";

    public $name = self::XP;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->name) . PHP_EOL;
    }
} 