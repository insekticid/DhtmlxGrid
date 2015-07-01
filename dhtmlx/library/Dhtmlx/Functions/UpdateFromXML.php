<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class UpdateFromXML extends InitFunction implements Functions {
    const EXPRESSION = "%s.updateFromXML('%s',%s,%s,%s);";

    /**
     * @var null url of the file
     */
    public $url = null;

    /**
     * @var bool insert new items (optional, true by default)
     */
    public $insert_new = true;

    /**
     * @var bool delete missed rows (optional, false by default)
     */
    public $del_missed = false;

    /**
     * @var string the function that will be executed after refresh is completted
     */
    public $afterCall = 'function(){return false;}';

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->url, var_export($this->insert_new, true), var_export($this->del_missed, true), $this->afterCall) . PHP_EOL;
    }
} 