<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class AttachEvent extends InitFunction implements Functions {
    const EXPRESSION = "%s.attachEvent('%s',%s);";

    public $event = null;

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
        if($this->event instanceof \Dhtmlx\Events\InitEvent){
            return sprintf(
                self::EXPRESSION,
                \Dhtmlx\DhtmlStatics::VAR_GRID,
                $this->event->getNameEvent(),
                $this->event->getFunction()
            ) . PHP_EOL;
        }
    }
} 