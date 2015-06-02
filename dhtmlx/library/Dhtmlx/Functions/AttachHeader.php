<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class AttachHeader implements Functions {
    const EXPRESSION = "%s.attachHeader('%s',%s);";

    /**
     * a text filter. Retrieves values which contain mask defined through text field.
     */
    const TEXT_FILTER = "#text_filter";

    /**
     * a select filter. Retrieves values which contain mask defined through dropdown list of possible values.
     */
    const SELECT_FILTER = "#select_filter";

    /**
     * a filter based on the dhtmlxCombo component. Retrieves values which contain mask defined through combo box.
     */
    const COMBO_FILTER = "#combo_filter";

    /**
     * an input box. Doesn't filter the grid but moves the selection to the nearest row containing a text input.
     */
    const TEXT_SEARCH = "#text_search";

    /**
     * a text filter that allows using comparison operators in it. Retrieves values which contain mask defined through text field.
    The possible comparison operators are:
    '=' - equal to;
    '>' - greater than;
    '<' - less than;
    '?' - less or equal to;
    '>=' - greater or equal to;
    'n1..n2' - a range of values.
     */
    const NUMERIC_FILTER = "#numeric_filter";

    public $headers = array();
    public $aligns = array();

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, implode(",", $this->headers), json_encode($this->aligns)) . PHP_EOL;
    }
} 