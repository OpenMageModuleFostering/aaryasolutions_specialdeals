<?php
class Aaryasolutions_Specialdeals_Block_Adminhtml_Specialdeals_Edit_Tab_List_Renderer_Order extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Action {
    public function render(Varien_Object $row)
    {
        return $this->_getValue($row);
    }


   	

    public function _getValue(Varien_Object $row)
    {
    	$val = $row->getData($this->getColumn()->getIndex());

   
	   return $results = Mage::helper('specialdeals')->getQtyTotal($val);

	   
	    
	   //return count($results);
    }

}

    ?>