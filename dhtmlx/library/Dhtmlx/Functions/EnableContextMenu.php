<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class EnableContextMenu extends InitFunction implements Functions {
    const EXPRESSION = "%s.enableContextMenu(%s);";

    /**
     * @var string dhtmlxMenu object, if null - context menu will be disabled
     */
    public $menu = 'new dhtmlXMenuObject(null, "standard");';

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->menu) . PHP_EOL;
    }
} 