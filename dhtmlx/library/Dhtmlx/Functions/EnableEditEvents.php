<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class EnableEditEvents extends InitFunction implements Functions {
    const EXPRESSION = "%s.enableEditEvents(%s,%s,%s);";

    /**
     * @var bool enable/disable editing by single click
     */
    public $click = false;

    /**
     * @var bool enable/disable editing by double click
     */
    public $dblclick = false;

    /**
     * @var bool enable/disable editing by pressing F2 key
     */
    public $f2Key = false;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, var_export($this->click, true), var_export($this->dblclick, true), var_export($this->f2Key, true)) . PHP_EOL;
    }
} 