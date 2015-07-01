<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetFieldName extends InitFunction implements Functions {
    const EXPRESSION = "%s.setFieldName(%s);";

    const GRID_ID = "{GRID_ID}";
    const ROW_ID = "{ROW_ID}";
    const ROW_INDEX = "{ROW_INDEX}";
    const COLUMN_ID = "{COLUMN_ID}";
    const COLUMN_INDEX = "{COLUMN_INDEX}";

    /**
     * @var null allows defining an input's name which will be used for data sending: mygrid.setFieldName("{GRID_ID}[{ROW_INDEX}].{COLUMN_ID}");
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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, $this->name) . PHP_EOL;
    }
} 