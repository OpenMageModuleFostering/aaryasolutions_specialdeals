<?php


class Aaryasolutions_Specialdeals_Block_Adminhtml_Specialdeals extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	public function __construct()
	{
		$this->_controller = 'adminhtml_specialdeals';
		$this->_blockGroup = 'specialdeals';
		$this->_headerText = Mage::helper('specialdeals')->__('Special Deals Manager');
		$this->_addButtonLabel = Mage::helper('specialdeals')->__('Add Special Deal');
		parent::__construct();
	}
}