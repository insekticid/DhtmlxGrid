<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class Load extends InitFunction implements Functions {
    const EXPRESSION = "%s.load('%s',function(){%s},'%s');";

    /**
     * @var null url to the external file
     */
    public $url = null;

    /**
     * @var string after loading callback function, optional, can be ommited. Function assignature:  function(){}
     */
    public $call = 'return false;';

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