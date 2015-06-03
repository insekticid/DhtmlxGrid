<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

class SetColTypes extends InitFunction implements Functions {
    const EXPRESSION = "%s.setColTypes('%s');";

    /**
     * A column with simple editable cells.
     */
    const TYPE_ED = "ed";

    /**
     * A column with editable text cells that treat data values as plain text, so HTML isn't allowed and any special char must be set without escaping.
     */
    const TYPE_EDTXT = "edtxt";

    /**
     * A column with editable numeric cells that allow you to specify formatting rules through the setNumberFormat method for it.
     */
    const TYPE_EDN = "edn";

    /**
     * A column with simple read-only cells without the possibility to edit the content.
     */
    const TYPE_RO = "ro";

    /**
     * A column with read-only numeric cells that treat data values as plain text, so HTML isn't allowed and any special char must be set without escaping.
     */
    const TYPE_ROTXT = "rotxt";

    /**
     * A column with read-only numeric cells that allow formatting values through the setNumberFormat method.
     */
    const TYPE_RON = "ron";

    /**
     * A simple column with a multiline editor.
     */
    const TYPE_TXT = "txt";

    /**
     * A column with a multiline editor that treats data values as plain text, so HTML isn't allowed and any special char must be set without escaping.
     */
    const TYPE_TXTTXT = "txttxt";

    /**
     * A column-aligned radio button.
     */
    const TYPE_RA = "ra";

    /**
     * A column-aligned radio button.
     */
    const TYPE_RA_STR = "ra_str";

    /**
     * A simple check box.
     */
    const TYPE_CH = "ch";

    /**
     * A simple editable select box.
     */
    const TYPE_CO = "co";

    /**
     * A not editable select box.
     */
    const TYPE_CORO = "coro";

    /**
     * An editable select box presented by DHTMLX combo.
     */
    const TYPE_COMBO = "combo";

    /**
     * A not editable select box with multiple selection.
     */
    const TYPE_CLIST = "clist";

    /**
     * A simple date picker presented by DHTMLX calendar.
     */
    const TYPE_ED_CALENDAR = "dhxCalendar";

    /**
     * A date picker presented by DHTMLX calendar with a possibility to input date manually.
     */
    const TYPE_RO_CALENDAR = "dhxCalendarA";

    /**
     * A simple color picker.
     */
    const TYPE_CP = "cp";

    /**
     * A column that treats data as link sources and renders them as links (analogous to the <a> HTML tag).
     * (specified as a '^'-delimited list)
     *  - text - the link text;
     *  - url - (optional) the URL of the page the link goes to (without quotes) or some javascript function(javascript:function(param1,param2){...};);
     *  - target - (optional) the target attribute specifying where to open the linked document.
     * EX: Go to DHTMLX^http://dhtmlx.com^_self
     */
    const TYPE_LINK = "link";

    /**
     * A column that treats data as the image source and renders them as images (analogous to the <img> HTML tag).
     * (specified as a '^'-delimited list)
     * - url - (mandatory) the URL of an image;
     * - alt - (optional) an alternate text for an image;
     * - link - (optional) the URL of the page you will go to after clicking on image (without quotes) or some javascript function that will be invoked;
     * - target - (optional) the target attribute specifying where to open the linked page.
     * EX: icons/open_icon.png^DHTMLX site^http://dhtmlx.com^_self
     */
    const TYPE_IMG = "img";

    /**
     * A column that treats data as price: values < 0 - rendered in green, values > 0 - rendered in red.
     */
    const TYPE_PRICE = "price";

    /**
     * A column that applies different colouring and marking based on the value. Intented for using with the sales data.
     */
    const TYPE_DYN = "dyn";

    /**
     * A popup calculator. Takes the format set by the setNumberFormat method
     */
    const TYPE_CALCK = "calck";

    public $types = array();

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, implode(",", $this->types)) . PHP_EOL;
    }
} 