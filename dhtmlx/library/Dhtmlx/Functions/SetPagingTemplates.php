<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetPagingTemplates extends InitFunction implements Functions {
    const EXPRESSION = "%s.setPagingTemplates(%s,%s);";

    /**
     * @var null EX: "Pages - [current:0] [current:+1] [current:+2], from [total] rows"
     */
    public $navigation_template = null;

    /**
     * @var null EX: "Pages <b>[from]-[to]</b> of <b>[total]</b>"
     */
    public $info_template = null;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->navigation_template, $this->info_template) . PHP_EOL;
    }
} 