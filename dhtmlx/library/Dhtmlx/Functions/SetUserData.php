<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetUserData extends InitFunction implements Functions {
    const EXPRESSION = "%s.setUserData(%s,%s,%s);";

    public $row_id = 0;

    /**
     * @var null the name of a user data block
     */
    public $name = null;

    /**
     * @var null the value of a user data block
     */
    public $value = null;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->row_id, $this->name, $this->value) . PHP_EOL;
    }
} 