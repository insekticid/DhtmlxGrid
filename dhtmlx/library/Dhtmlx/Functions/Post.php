<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class Post extends InitFunction implements Functions {
    const EXPRESSION = "%s.post('%s',%s,function(){%s},'%s');";

    /**
     * @var null url to an external file Ex: data.php?id=1
     */
    public $url = null;

    /**
     * @var null POST request Ex: "data=10"
     */
    public $post = null;

    /**
     * @var string an after loading callback function, optional, can be omitted. Function assignature function(){}
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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->url, $this->post, $this->call, $this->type) . PHP_EOL;
    }
} 