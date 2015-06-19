<?php
/**
 * Created by PhpStorm.
 * User: tmax
 * Date: 03/06/15
 * Time: 17:00
 */

namespace Dhtmlx\Events;


class OnRowSelect extends InitEvent {
    const NAME_EVENT = "onRowSelect";

    const FUNCTION_ASSIGNATURE= "function(id,ind){%s}";

    private $function;

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

    /**
     * @return string
     */
    public function getNameEvent()
    {
        return self::NAME_EVENT;
    }

    /**
     * Function assignature: function(id,ind){ ... }
     * @param $contentFunction
     * @return $this
     */
    public function setFunction($contentFunction)
    {
        $this->function = sprintf(self::FUNCTION_ASSIGNATURE, $contentFunction);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFunction()
    {
        return $this->function;
    }
} 