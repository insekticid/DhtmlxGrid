# DhtmlxGrid Example

use Dhtmlx;

$dhtmlx->setEnableMultiselect(true)
    ->setEnableColumnAutoSize(true)
    ->setActive(true);

$item = new Dhtmlx\DhtmlColumn("column1");
$item->label = "Coluna 1";
$item->type = \Dhtmlx\Functions\SetColTypes::TYPE_RO;
$item->filter = Dhtmlx\Functions\AttachHeader::TEXT_FILTER;
$item->width = 200;
$item->align = \Dhtmlx\Functions\SetColAlign::ALIGN_LEFT;
$dhtmlx->addColspan($item);

$item = new Dhtmlx\DhtmlColumn("column2");
$item->label = "Coluna 2";
$item->type = \Dhtmlx\Functions\SetColTypes::TYPE_RO;
$item->filter = Dhtmlx\Functions\AttachHeader::SELECT_FILTER;
$item->width = 300;
$item->sort = \Dhtmlx\Functions\SetColSorting::SORT_STR;
$item->align = \Dhtmlx\Functions\SetColAlign::ALIGN_CENTER;
$dhtmlx->addColspan($item);

$dhtmlx->addRow(1, array("a1", "b1"));
$dhtmlx->addRow(2, array("a2", "b2"));
$dhtmlx->addRow(3, array("a3", "b3"));

echo $dhtmlx->rendererHeader();
echo $dhtmlx->rendererHtml();
echo $dhtmlx->render();
