<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class GetUserData extends InitFunction implements Functions {
    const EXPRESSION = "%s.getUserData(%s,%s);";

    public $row_id = "''";

    /**
     * @var null name of the user data
     */
    public $name = null;

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->row_id, $this->name) . PHP_EOL;
    }
} 