<?php


class Aaryasolutions_Specialdeals_Block_Adminhtml_Specialdeals_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('specialdeals_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('specialdeals')->__('Special Deals Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('specialdeals')->__('Special Deals Information'),
          'title'     => Mage::helper('specialdeals')->__('Special Deals Information'),
          'content'   => $this->getLayout()->createBlock('specialdeals/adminhtml_specialdeals_edit_tab_form')->toHtml(),
      ));

       $this->addTab('products_list', array(
          'label'     => Mage::helper('specialdeals')->__('Products List'),
          'title'     => Mage::helper('specialdeals')->__('Products List'),
          'content'   => $this->getLayout()->createBlock('specialdeals/adminhtml_specialdeals_edit_tab_list')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}