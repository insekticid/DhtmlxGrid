<?php

namespace Dhtmlx;

/**
 * Class DhtmlColumn
 * @package Dhtmlx
 */
class DhtmlColumn {

    /**
     * @var string
     */
    private $id = '';

    /**
     * @var string
     */
    private $label = '';

    /**
     * @var string
     */
    private $type = \Dhtmlx\Functions\SetColTypes::TYPE_RO;

    /**
     * @var string
     */
    private $filter = '';

    /**
     * @var int
     */
    private $width = 0;

    /**
     * @var string
     */
    private $sort = \Dhtmlx\Functions\SetColSorting::SORT_NA;

    /**
     * @var string
     */
    private $align = \Dhtmlx\Functions\SetColAlign::ALIGN_LEFT;

    /**
     * @var array
     */
    private $cols = array();

    /**
     * @param $id string ID for grid
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->$name;
    }

    /**
     * @param DhtmlColumn $item
     * @throws \Exception
     */
    public function addColspan(DhtmlColumn $item)
    {
        if(!($item instanceof DhtmlColumn)){
            throw new \Exception("Invalid DhtmlColumn");
        }

        if(!isset($this->cols[$item->id])){
            $this->cols[$item->id] = $item;
        }
        else{
            throw new \Exception("Coluna já existente no agrupamento {$this->id}");
        }
    }

    /**
     * @param $id
     */
    public function removeColspan($id)
    {
        if(isset($this->cols[$id])){
            unset($this->cols[$id]);
        }
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }
} 