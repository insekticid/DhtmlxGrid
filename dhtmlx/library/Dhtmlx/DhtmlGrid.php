<?php

namespace Dhtmlx;


/**
 * Class DhtmlGrid
 * @package Dhtmlx
 */
class DhtmlGrid {

    const EXPRESSION = "%s = new dhtmlXGridObject('%s');";

    /**
     * @var string
     */
    private $idGrid;

    /**
     * @var array
     */
    private $columns = array();

    /**
     * @var array
     */
    private $rows = array();

    /**
     * @var array
     */
    private $functions = array();

    /**
     * @var null
     */
    private $gridHeader = null;

    /**
     * @var array
     */
    private $configHeader = array();

    /**
     * @param string $id
     */
    public function __construct($id = "grid")
    {
        $this->idGrid = $id;
    }

    /**
     * @param DhtmlColumn $item
     * @return $this
     * @throws \Exception
     */
    public function addColspan(DhtmlColumn $item)
    {
        if(!($item instanceof DhtmlColumn)){
            throw new \Exception("Invalid DhtmlColumn");
        }

        if(!isset($this->columns[$item->id])){
            $this->columns[$item->id] = $item;
        }
        else{
            throw new \Exception("Column exists");
        }

        return $this;
    }

    /**
     * @param $id
     * @return $this
     */
    public function removeColspan($id)
    {
        if(isset($this->columns[$id])){
            unset($this->columns[$id]);
        }

        return $this;
    }

    /**
     * @param int $id
     * @param array $data
     * @return $this
     * @throws \Exception
     */
    public function addRow($id, array $data = array())
    {
        if(!is_numeric($id)){
            throw new \Exception("Invalid ID - No Numeric");
        }

        if(!isset($this->rows[$id])){
            $this->rows[$id] = $data;
        }
        else{
            throw new \Exception("Row {$id} exists");
        }

        return $this;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function removeRow($id)
    {
        if(isset($this->rows[$id])){
            unset($this->rows[$id]);
        }

        return $this;
    }

    /**
     * @param $function
     * @return $this
     */
    public function addFunction(\Dhtmlx\Functions\InitFunction $function)
    {
        if(!($function instanceof \Dhtmlx\Functions\InitFunction)){
            throw new \Exception("The function is not Grid Function");
        }
        $this->functions[] = $function;
        return $this;
    }

    /**
     * @param boolean $bool
     * @return $this
     */
    public function setEnableMultiselect($bool)
    {
        \Dhtmlx\Functions\EnableMultiselect::getInstance()->enable = $bool;
        return $this;
    }

    /**
     * @param boolean $bool
     * @return $this
     */
    public function setEnableColumnAutoSize($bool)
    {
        \Dhtmlx\Functions\EnableColumnAutoSize::getInstance()->enable = $bool;
        return $this;
    }

    /**
     * @param boolean $bool
     * @return $this
     */
    public function setActive($bool)
    {
        \Dhtmlx\Functions\SetActive::getInstance()->enable = $bool;
        return $this;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setTypeDataParse($type = \Dhtmlx\Functions\Parse::TYPE_JSON)
    {
        \Dhtmlx\Functions\Parse::getInstance()->type = $type;
        return $this;
    }

    /**
     * @param string $skin
     * @return string
     */
    public function rendererHeader($skin = "web")
    {
        if(is_null($this->gridHeader)){
            $this->_header();
        }

        $header  = sprintf('<link href="%sdhtmlxgrid.css" media="screen" rel="stylesheet" type="text/css">', \Dhtmlx\DhtmlStatics::PATH_PUBLIC) . PHP_EOL;
        $header .= sprintf('<link href="%sskins/dhtmlxgrid_dhx_%s.css" media="screen" rel="stylesheet" type="text/css">', \Dhtmlx\DhtmlStatics::PATH_PUBLIC, $skin) . PHP_EOL;
        $header .= sprintf('<script type="text/javascript" src="%sdhtmlxgrid.js"></script>', \Dhtmlx\DhtmlStatics::PATH_PUBLIC) . PHP_EOL;
        $header .= sprintf('<script type="text/javascript" src="%sext/dhtmlxgrid_filter.js"></script>', \Dhtmlx\DhtmlStatics::PATH_PUBLIC) . PHP_EOL;

        //USE ONLY IN DHTMLCALENDAR
        if(isset($this->configHeader["useCalendar"]) && $this->configHeader["useCalendar"] === true) {
            $header .= sprintf('<link href="%sskins/dhtmlxcalendar_dhx_%s.css" media="screen" rel="stylesheet" type="text/css">', \Dhtmlx\DhtmlStatics::PATH_PUBLIC, $skin) . PHP_EOL;
            $header .= sprintf('<script type="text/javascript" src="%sext/dhtmlxcalendar.js"></script>', \Dhtmlx\DhtmlStatics::PATH_PUBLIC) . PHP_EOL;
            $header .= sprintf('<script type="text/javascript" src="%sexcells/dhtmlxgrid_excell_dhxcalendar.js"></script>', \Dhtmlx\DhtmlStatics::PATH_PUBLIC) . PHP_EOL;
        }

        //USE ONLY FOR LINKS IN GRID
        if(isset($this->configHeader["useLink"]) && $this->configHeader["useLink"] === true) {
            $header .= sprintf('<script type="text/javascript" src="%sexcells/dhtmlxgrid_excell_link.js"></script>', \Dhtmlx\DhtmlStatics::PATH_PUBLIC) . PHP_EOL;
        }

        //USE ONLY FOR CALCULATORS IN GRID
        if(isset($this->configHeader["useCalculator"]) && $this->configHeader["useCalculator"] === true) {
            $header .= sprintf('<script type="text/javascript" src="%sexcells/dhtmlxgrid_excell_calck.js"></script>', \Dhtmlx\DhtmlStatics::PATH_PUBLIC) . PHP_EOL;
        }

        //USE ONLY FOR CLIST IN GRID
        if(isset($this->configHeader["useClist"]) && $this->configHeader["useClist"] === true) {
            $header .= sprintf('<script type="text/javascript" src="%sexcells/dhtmlxgrid_excell_clist.js"></script>', \Dhtmlx\DhtmlStatics::PATH_PUBLIC) . PHP_EOL;
        }

        //USE ONLY FOR COMBO IN GRID
        if(isset($this->configHeader["useCombo"]) && $this->configHeader["useCombo"] === true) {
            $header .= sprintf('<script type="text/javascript" src="%sext/dhtmlxcombo.js"></script>', \Dhtmlx\DhtmlStatics::PATH_PUBLIC) . PHP_EOL;
            $header .= sprintf('<script type="text/javascript" src="%sexcells/dhtmlxgrid_excell_combo.js"></script>', \Dhtmlx\DhtmlStatics::PATH_PUBLIC) . PHP_EOL;
        }

        return $header;
    }

    /**
     * @param string|int $width
     * @param string|int $height
     * @return string
     */
    public function rendererHtml($width = "100%", $height = 400)
    {
        $wGrid = (is_numeric($width)) ? $width . "px" : $width;
        $hGrid = (is_numeric($height)) ? $height . "px" : $height;
        return "<div id='{$this->idGrid}' style='width: {$wGrid}; height: {$hGrid};'></div>" . PHP_EOL;
    }

    /**
     * @return string
     */
    public function render()
    {
        $grid  = sprintf(self::EXPRESSION, DhtmlStatics::VAR_GRID, $this->idGrid) . PHP_EOL;
        $grid .= \Dhtmlx\Functions\SetImagePath::getInstance()->render();
        $grid .= \Dhtmlx\Functions\EnableMultiselect::getInstance()->render();
        $grid .= \Dhtmlx\Functions\EnableColumnAutoSize::getInstance()->render();
        $grid .= \Dhtmlx\Functions\SetActive::getInstance()->render();

        if(is_null($this->gridHeader)){
            $this->_header();
        }
        $grid .= $this->gridHeader;

        $grid .= \Dhtmlx\DhtmlStatics::VAR_GRID.".init();";

        $this->_populateGrid($grid);

        foreach ($this->functions as $function) {
            $grid .= $function->render();
        }


        return "<script>" . PHP_EOL . $grid . PHP_EOL . "</script>";
    }

    /**
     * @param $grid
     */
    private function _populateGrid(&$grid)
    {
        $rows = array("rows" => array());
        foreach ($this->rows as $id => $data) {
            $rows["rows"][] = array(
                "id" => $id,
                "data" => $data,
            );
        }
        $parse = \Dhtmlx\Functions\Parse::getInstance();
        $parse->data = $rows;
        $grid .= $parse->render();
    }

    /**
     * @param $grid
     */
    private function _header()
    {
        $headerConfig = new DhtmlHeaderConfig($this->columns);
        $configInLine = $headerConfig->getConfigInline();
        $this->configHeader = $headerConfig->getExtConfig();

        $setHeader = \Dhtmlx\Functions\SetHeader::getInstance();
        $setHeader->headers = $configInLine["labelHeaderColspan"];
        $setHeader->aligns = $configInLine["alignHeaderColspan"];
        $this->gridHeader .= $setHeader->render();

        $attachHeader = \Dhtmlx\Functions\AttachHeader::getInstance();
        $attachHeader->aligns = $configInLine["alignHeaderRowspan"];

        if($this->configHeader['useColspan']){
            $attachHeader->headers = $configInLine["labelHeaderRowspan"];
            $this->gridHeader .= $attachHeader->render();
        }

        $attachHeader->headers = $configInLine["filter"];
        $this->gridHeader .= $attachHeader->render();

        $setInitWidths = \Dhtmlx\Functions\SetInitWidths::getInstance();
        $setInitWidths->widths = $configInLine["width"];
        $this->gridHeader .= $setInitWidths->render();

        $setColAlign = \Dhtmlx\Functions\SetColAlign::getInstance();
        $setColAlign->aligns = $configInLine["align"];
        $this->gridHeader .= $setColAlign->render();

        $setColTypes = \Dhtmlx\Functions\SetColTypes::getInstance();
        $setColTypes->types = $configInLine["type"];
        $this->gridHeader .= $setColTypes->render();

        $setColSorting = \Dhtmlx\Functions\SetColSorting::getInstance();
        $setColSorting->sort = $configInLine["sort"];
        $this->gridHeader .= $setColSorting->render();

        $setColumnIds = \Dhtmlx\Functions\SetColumnIds::getInstance();
        $setColumnIds->ids = $configInLine["id"];
        $this->gridHeader .= $setColumnIds->render();
    }
} 