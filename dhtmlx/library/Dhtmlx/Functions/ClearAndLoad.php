<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class ClearAndLoad extends InitFunction implements Functions {
    const EXPRESSION = "%s.clearAndLoad(%s,%s,'s');";

    /**
     * @var null url to an external file
     */
    public $url = null;

    /**
     * @var null after loading callback function, optional, can be omitted
     */
    public $call = 'function(){return false;}';

    /**
     * @var string type of data (xml,csv,json,jsarray), optional, xml by default
     */
    public $type = \Dhtmlx\Functions\Parse::TYPE_XML;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->url, $this->call, $this->type) . PHP_EOL;
    }
} 