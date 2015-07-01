<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetPagingSkin extends InitFunction implements Functions {
    const EXPRESSION = "%s.setPagingSkin(%s);";

    const TEMPLATE_DEFAULT = "default";
    const TEMPLATE_BRICKS = "bricks";
    const TEMPLATE_TOOLBAR = "toolbar";
    const TEMPLATE_DHX_WEB= "dhx_web";

    public $name = self::TEMPLATE_DEFAULT;

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