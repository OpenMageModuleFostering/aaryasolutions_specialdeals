<?php


class Aaryasolutions_Specialdeals_Block_Adminhtml_Specialdeals_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'specialdeals';
        $this->_controller = 'adminhtml_specialdeals';
        
        $this->_updateButton('save', 'label', Mage::helper('specialdeals')->__('Save Deal'));
        $this->_updateButton('delete', 'label', Mage::helper('specialdeals')->__('Delete Deal'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('specialdeals_data') && Mage::registry('specialdeals_data')->getId() ) {
            return Mage::helper('specialdeals')->__("Edit Deal");
        } else {
            return Mage::helper('specialdeals')->__('Add Deal');
        }
    }
}