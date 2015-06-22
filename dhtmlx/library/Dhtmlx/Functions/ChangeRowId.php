<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class ChangeRowId extends InitFunction implements Functions {
    const EXPRESSION = "%s.changeRowId(%s,%s);";

    public $oldIdRow = 0;
    public $newIdRow = 0;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->oldIdRow, $this->newIdRow) . PHP_EOL;
    }
} 