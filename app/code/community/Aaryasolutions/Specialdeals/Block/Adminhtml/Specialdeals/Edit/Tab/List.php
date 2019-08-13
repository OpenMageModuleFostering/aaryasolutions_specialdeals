<?php

class Aaryasolutions_Specialdeals_Block_Adminhtml_Specialdeals_Edit_Tab_List extends Mage_Adminhtml_Block_Widget_Grid
{

   public function __construct()
    {
       parent::__construct();
        $this->_blockGroup = 'specialdeals';
        $this->_controller = 'adminhtml_specialdeals_edit_tab_list';
        $this->_headerText = Mage::helper('specialdeals')->__('Special Deal Products');
        $this->setTemplate('specialdeals/list.phtml');
        $this->setSaveParametersInSession(true);
        
    }


    protected function _prepareCollection()
  {



   $currentid=Mage::app()->getRequest()->getParam('id');
   if(!empty($currentid))
   {

    $price=Mage::getModel('specialdeals/specialdeals')->getPriceFromId($currentid);


   $bb = new Aaryasolutions_Specialdeals_Block_Specialpriceproducts();


      $this->setCollection($bb->listSpecialProductsByPrice($price,true));
      return parent::_prepareCollection();
    }
    else
    {
      return null;
    }
  }


  protected function _prepareColumns()
  {
      $this->addColumn('entity_id', array(
          'header'    => Mage::helper('specialdeals')->__('ID'),
          'align'     =>'left',
          'width'     => '50px',
          'index'     => 'entity_id',
      ));

       $this->addColumn('name', array(
          'header'    => Mage::helper('specialdeals')->__('Product Name'),
          'align'     =>'left',
          'width'     => '50px',
          'index'     => 'name',
      ));


       

    $this->addColumn('order_count', array(
          'header'    => Mage::helper('specialdeals')->__('Order Count'),
          'align'     =>'left',
          'width'     => '50px',
          'index'     => 'entity_id',
           'renderer' => 'specialdeals/adminhtml_specialdeals_edit_tab_list_renderer_order'
      ));


    $this->addColumn('orders', array(
          'header'    => Mage::helper('specialdeals')->__('Orders'),
          'align'     =>'left',
          'width'     => '50px',
          'index'     => 'entity_id',
           'renderer' => 'specialdeals/adminhtml_specialdeals_edit_tab_list_renderer_listorders'
      ));

    

      return parent::_prepareColumns();
  }

   public function getRowUrl($row)
  {
      //return $this->getUrl('*/*/edit', array('id' => $row->getId()));

      return Mage::helper('adminhtml')->getUrl('adminhtml/catalog_product/edit', array('id' => $row->getId()));
  }


  
}