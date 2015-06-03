<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class AddRow extends InitFunction implements Functions {
    const EXPRESSION = "%s.addRow(%s,'%s',%s);";

    public $newId = 0;
    public $text = "";
    public $index = null;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->newId, $this->text, $this->index) . PHP_EOL;
    }
} 