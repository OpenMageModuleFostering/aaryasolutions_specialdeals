<?php


class Aaryasolutions_Specialdeals_Block_Adminhtml_Specialdeals_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('specialdealsGrid');
      $this->setDefaultSort('specialdeals_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('specialdeals/specialdeals')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('specialdeals_id', array(
          'header'    => Mage::helper('specialdeals')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'specialdeals_id',
      ));

	  

	  $this->addColumn('specialdeals_number', array(
          'header'    => Mage::helper('specialdeals')->__('Deal'),
          'align'     =>'left',
          'index'     => 'specialdeals_number',
      ));

	  $this->addColumn('specialdeals_color', array(
          'header'    => Mage::helper('specialdeals')->__('Special Deal Color'),
          'align'     =>'left',
          'index'     => 'specialdeals_color',
		  
      ));

     $this->addColumn('specialdeals_price', array(
          'header'    => Mage::helper('specialdeals')->__('Special Price'),
          'align'     =>'left',
          'index'     => 'specialdeals_price',
      
      ));

	  $this->addColumn('specialdeals_status', array(
          'header'    => Mage::helper('specialdeals')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'specialdeals_status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));

      $this->addColumn('specialdeals_sort', array(
            'header'    => Mage::helper('specialdeals')->__('Sort Order'),
            'align'     =>'left',
            'index'     => 'specialdeals_sort',
        ));
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('specialdeals')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('specialdeals')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));

      return parent::_prepareColumns();
  }

   

	protected function _afterLoadCollection()
    {
        $this->getCollection()->walk('afterLoad');
        parent::_afterLoadCollection();
    }

    protected function _filterStoreCondition($collection, $column)
    {
        if (!$value = $column->getFilter()->getValue()) {
            return;
        }

        $this->getCollection()->addStoreFilter($value);
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('specialdeals_id');
        $this->getMassactionBlock()->setFormFieldName('specialdeals');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('specialdeals')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('specialdeals')->__('Are you sure?')
        ));
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}