<?php
/**
 * Created by PhpStorm.
 * User: tmax
 * Date: 30/05/15
 * Time: 20:16
 */

namespace Dhtmlx;


class DhtmlHeaderConfig {
    /**
     * @var object
     */
    private $columns;

    /**
     * @var bool
     */
    private $extConfig = array(
        "useColspan" => false,
        "useCalendar" => false,
        "useLink" => false,
        "useCalculator" => false,
        "useClist" => false,
        "useCombo" => false,
    );

    /**
     * @var array
     */
    private $configInLine = array(
        "id" => array(),
        "labelHeaderColspan" => array(),
        "alignHeaderColspan" => array(),
        "labelHeaderRowspan" => array(),
        "alignHeaderRowspan" => array(),
        "filter" => array(),
        "width" => array(),
        "align" => array(),
        "type" => array(),
        "sort" => array(),
    );

    public function __construct($columns)
    {
        $this->columns = $columns;
        $this->_setConfigInLine();
    }

    /**
     * @return bool
     */
    public function getExtConfig()
    {
        return $this->extConfig;
    }

    /**
     * @return array
     */
    public function getConfigInline()
    {
        return $this->configInLine;
    }

    private function _setConfigInLine()
    {
        foreach ($this->columns as $column) {
            $this->configInLine["labelHeaderColspan"][] = $column->label;
            $this->configInLine["alignHeaderColspan"][] = sprintf(\Dhtmlx\DhtmlStatics::CONFIG_ALIGN_HEADER,$column->align);
            if(count($column->cols)){
                $this->extConfig["useColspan"] = true;
                $count = 0;
                foreach ($column->cols as $col) {
                    if($count > 0) $this->configInLine["labelHeaderColspan"][] = \Dhtmlx\DhtmlStatics::COLSPAN_IDENTIFICADOR;
                    $count++;

                    $this->configInLine["id"][] = $col->id;
                    $this->configInLine["labelHeaderRowspan"][] = $col->label;
                    $this->configInLine["alignHeaderRowspan"][] = sprintf(\Dhtmlx\DhtmlStatics::CONFIG_ALIGN_HEADER,$col->align);
                    $this->configInLine["filter"][] = $col->filter;
                    $this->configInLine["width"][] = $col->width;
                    $this->configInLine["align"][] = $col->align;
                    $this->configInLine["type"][] = $col->type;
                    $this->configInLine["sort"][] = $col->sort;

                    $this->setConfigHeader($col->type);
                }

            }
            else{
                $this->configInLine["id"][] = $column->id;
                $this->configInLine["labelHeaderRowspan"][] = \Dhtmlx\DhtmlStatics::ROWSPAN_IDENTIFICADOR;
                $this->configInLine["alignHeaderRowspan"][] = sprintf(\Dhtmlx\DhtmlStatics::CONFIG_ALIGN_HEADER,$column->align);
                $this->configInLine["filter"][] = $column->filter;
                $this->configInLine["width"][] = $column->width;
                $this->configInLine["align"][] = $column->align;
                $this->configInLine["type"][] = $column->type;
                $this->configInLine["sort"][] = $column->sort;

                $this->setConfigHeader($column->type);
            }
        }
    }

    private function setConfigHeader($type)
    {
        switch($type){
            case \Dhtmlx\Functions\SetColTypes::TYPE_ED_CALENDAR:
            case \Dhtmlx\Functions\SetColTypes::TYPE_RO_CALENDAR:
                $this->extConfig["useCalendar"] = true;
                break;
            case \Dhtmlx\Functions\SetColTypes::TYPE_LINK:
                $this->extConfig["useLink"] = true;
                break;
            case \Dhtmlx\Functions\SetColTypes::TYPE_CALCK:
                $this->extConfig["useCalculator"] = true;
                break;
            case \Dhtmlx\Functions\SetColTypes::TYPE_CLIST:
                $this->extConfig["useClist"] = true;
                break;
            case \Dhtmlx\Functions\SetColTypes::TYPE_COMBO:
                $this->extConfig["useCombo"] = true;
                break;
        }
    }
} 