<?php

class Aaryasolutions_Specialdeals_Block_Adminhtml_Specialdeals_Edit_Tab_Orders extends Mage_Adminhtml_Block_Widget_Grid
{

   public function __construct()
    {
       parent::__construct();
        $this->_blockGroup = 'specialdeals';
        $this->_controller = 'adminhtml_specialdeals_edit_tab_orders';
        $this->_headerText = Mage::helper('specialdeals')->__('Special Deal Orders');
        /* $this->setDefaultSort('hb_specialdeals_id');
         $this->setDefaultDir('ASC');*/
 
       
        $this->setTemplate('specialdeals/orders.phtml');
        $this->setSaveParametersInSession(true);
        
    }


    protected function _prepareCollection()
  {



   $pid=Mage::app()->getRequest()->getParam('pid');

   $items = Mage::getModel('sales/order_item')->getCollection();
$items->getSelect()->join( array('sales_order'=>Mage::getSingleton('core/resource')->getTableName('sales/order')), 'main_table.order_id = sales_order.entity_id', array('sales_order.*'));
$items->getSelect()->where('product_id=?', $pid);

 $this->setCollection($items);





      return parent::_prepareCollection();
  }


  protected function _prepareColumns()
  {
      $this->addColumn('order_id', array(
          'header'    => Mage::helper('specialdeals')->__('Order ID'),
          'align'     =>'left',
          'width'     => '50px',
          'index'     => 'order_id',
      ));

      $this->addColumn('increment_id', array(
          'header'    => Mage::helper('specialdeals')->__('Order Code'),
          'align'     =>'left',
          'width'     => '50px',
          'index'     => 'increment_id',
      ));


       $this->addColumn('created_at', array(
          'header'    => Mage::helper('specialdeals')->__('Created Date'),
          'align'     =>'left',
          'width'     => '50px',
          'index'     => 'created_at',
      ));


       

    $this->addColumn('qty_ordered', array(
          'header'    => Mage::helper('specialdeals')->__('Qty Ordered'),
          'align'     =>'left',
          'width'     => '50px',
          'index'     => 'qty_ordered',
          
      ));

     $this->addColumn('state', array(
          'header'    => Mage::helper('specialdeals')->__('State'),
          'align'     =>'left',
          'width'     => '50px',
          'index'     => 'state',
          
      ));

     $this->addColumn('status', array(
          'header'    => Mage::helper('specialdeals')->__('Status'),
          'align'     =>'left',
          'width'     => '50px',
          'index'     => 'status',
          
      ));


     $helper = Mage::helper('specialdeals');

  
      $this->addExportType('specialdeals/adminhtml_specialdeals/exportCsv', $helper->__('CSV'));
    

      return parent::_prepareColumns();
  }

   public function getRowUrl($row)
  {
      //return $this->getUrl('*/*/edit', array('id' => $row->getId()));

      return Mage::helper('adminhtml')->getUrl('adminhtml/catalog_product/edit', array('id' => $row->getId()));
  }


  
}