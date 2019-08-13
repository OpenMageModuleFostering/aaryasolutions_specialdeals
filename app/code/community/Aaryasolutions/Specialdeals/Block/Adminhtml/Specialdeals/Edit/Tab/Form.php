<?php

class Aaryasolutions_Specialdeals_Block_Adminhtml_Specialdeals_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {

	  

      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('specialdeals_form', array('legend'=>Mage::helper('specialdeals')->__('Special Deal information')));

		

      

      $fieldset->addField('specialdeals_number', 'text', array(
          'label'     => Mage::helper('specialdeals')->__('Deal Number'),
          'required'  => true,
          'name'      => 'specialdeals_number',
      ));
      $fieldset->addField('specialdeals_price', 'text', array(
          'label'     => Mage::helper('specialdeals')->__('Deal Price'),
          'required'  => true,
          'name'      => 'specialdeals_price',
      ));

      $fieldset->addField('specialdeals_color', 'text', array(
          'label'     => Mage::helper('specialdeals')->__('Deal Color'),
          'required'  => true,
          'name'      => 'specialdeals_color',
      ));

		
      $fieldset->addField('specialdeals_status', 'select', array(
          'label'     => Mage::helper('specialdeals')->__('Status'),
          'name'      => 'specialdeals_status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('specialdeals')->__('Enabled'),
              ),
              array(
                  'value'     => 2,
                  'label'     => Mage::helper('specialdeals')->__('Disabled'),
              ),
          ),
      ));

      $fieldset->addField('specialdeals_sort', 'text', array(
            'label'     => Mage::helper('specialdeals')->__('Sort Order'),
            'required'  => false,
            'name'      => 'specialdeals_sort',
        ));

      $data = array();
      if ( Mage::getSingleton('adminhtml/session')->getSpecialdealsData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getSpecialdealsData());
          Mage::getSingleton('adminhtml/session')->getSpecialdealsData(null);
      } elseif ( Mage::registry('specialdeals_data') ) {
          $form->setValues(Mage::registry('specialdeals_data')->getData());
      }

      
      return parent::_prepareForm();
  }
}