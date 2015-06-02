<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class Parse implements Functions {
    const EXPRESSION = "%s.parse(%s,'%s');";

    const TYPE_XML = "xml";
    const TYPE_JSON = "json";
    const TYPE_JSARRAY = "jsarray";
    const TYPE_CSV = "CSV";

    public $data = array();
    public $type = self::TYPE_JSON;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, json_encode($this->data), $this->type) . PHP_EOL;
    }
} 