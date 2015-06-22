<?php

namespace Dhtmlx\Functions;


use Dhtmlx\Interfaces\Functions;

/**
 * Class EnablePaging
 * @package Dhtmlx\Functions
 * Only PRO
 */

class EnablePaging extends InitFunction implements Functions {
    const EXPRESSION = "%s.enablePaging(%s,%s,%s,'%s',%s,'%s');";

    public $enable = true;

    /**
     * @var int count of rows per page
     */
    public $pageSize = 20;

    /**
     * @var int count of visible page selectors
     */
    public $pagesInGrp = 10;

    /**
     * @var string ID or container which will be used for showing paging controls
     */
    public $pagingControlsContainer = "pagingArea";

    /**
     * @var bool enable/disable showing of additional info about paging state
     */
    public $showRecInfo = true;

    /**
     * @var string ID or container which will be used for showing paging state
     */
    public $pagingStateContainer = "recinfoArea";

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
        return sprintf(self::EXPRESSION, \Dhtmlx\DhtmlStatics::VAR_GRID, var_export($this->enable, true), $this->pageSize, $this->pagesInGrp, $this->pagingControlsContainer, var_export($this->showRecInfo, true), $this->pagingStateContainer) . PHP_EOL;
    }
} 