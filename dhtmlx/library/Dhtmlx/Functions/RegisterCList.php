<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class RegisterCList extends InitFunction implements Functions {
    const EXPRESSION = "%s.registerCList(%s,%s);";

    public $cId = 0;

    /**
     * @var array an array of options set in the list. Ex: array("Stephen King","John Grisham","Honore de Balzac")
     */
    public $list = array();

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->cId, json_encode($this->list)) . PHP_EOL;
    }
} 