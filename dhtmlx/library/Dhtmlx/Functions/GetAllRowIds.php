<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class GetAllRowIds extends InitFunction implements Functions {
    const EXPRESSION = "%s.getAllRowIds(%s);";

    /**
     * @var string delimiter to be used in the list (optional, comma by default)
     */
    public $separator = ",";

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->separator) . PHP_EOL;
    }
} 