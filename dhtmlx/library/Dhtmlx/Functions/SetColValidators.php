<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetColValidators extends InitFunction implements Functions {
    const EXPRESSION = "%s.setColValidators(%s);";

    const VALIDAEMPTY = "Empty";
    const VALIDANOTEMPTY = "NotEmpty";
    const VALIDAPLHANUMERIC = "ValidAplhaNumeric";
    const VALIDBOOLEAN = "ValidBoolean";
    const VALIDCURRENCY = "ValidCurrency";
    const VALIDDATE = "ValidDate";
    const VALIDDATETIME = "ValidDatetime";
    const VALIDEMAIL = "ValidEmail";
    const VALIDINTEGER = "ValidInteger";
    const VALIDIPV4 = "ValidIPv4";
    const VALIDNUMERIC = "ValidNumeric";
    const VALIDSIN = "ValidSIN";
    const VALIDSSN = "ValidSSN";
    const VALIDTIME = "ValidTime";

    /**
     * @var array Ex: array("NotEmpty,ValidInteger","ValidEmail")
     */
    public $vals = array();

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, json_encode($this->vals)) . PHP_EOL;
    }
} 