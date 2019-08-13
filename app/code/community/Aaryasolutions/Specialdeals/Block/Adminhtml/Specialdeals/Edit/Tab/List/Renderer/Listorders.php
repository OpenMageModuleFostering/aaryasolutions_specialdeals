<?php
class Aaryasolutions_Specialdeals_Block_Adminhtml_Specialdeals_Edit_Tab_List_Renderer_Listorders extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Action {
   
    public function render(Varien_Object $row)
    {
        return $this->_getValue($row);
    }



   	

    public function _getValue(Varien_Object $row)
    {
    	$val = $row->getData($this->getColumn()->getIndex());

     
	    return '<a href="'.Mage::helper("adminhtml")->getUrl("specialdeals/adminhtml_specialdeals/orders", array('pid'=>$val)).'">View</a> | <a href="'.Mage::helper("adminhtml")->getUrl("specialdeals/adminhtml_specialdeals/exportCsv", array('pid'=>$val)).'">Export</a>';

	    


    }

    }

    ?>