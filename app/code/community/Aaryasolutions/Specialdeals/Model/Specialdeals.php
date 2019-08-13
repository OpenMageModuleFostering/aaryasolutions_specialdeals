<?php

class Aaryasolutions_Specialdeals_Model_Specialdeals extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('specialdeals/specialdeals');
    }


    public function getBargainBins(){

    	$collection1 = Mage::getModel('specialdeals/specialdeals')->getCollection();
		$collection1-> addFieldToFilter('specialdeals_status', array('eq' => 1));
		$collection1-> getSelect()->order('specialdeals_sort' , 'ASC');

		return $collection1;
		


    }


    public function getPriceFromBinNumber($num){

		
		$collection = Mage::getModel('specialdeals/specialdeals')->getCollection();
		$collection-> addFieldToFilter('specialdeals_number', array('eq' => $num));
		
		foreach($collection as $c){
			
			return $c->getspecialdeals_price();
			
		}
    }


    public function getPriceFromId($num){

		
		$collection = Mage :: getModel('specialdeals/specialdeals')->getCollection();
		$collection-> addFieldToFilter('specialdeals_id', array('eq' => $num));
		
		foreach($collection as $c){
			
			return $c->getspecialdeals_price();
			
		}
    }

    public function getColorFromBinNumber($num){

		
		$collection = Mage :: getModel('specialdeals/specialdeals')->getCollection();
		$collection-> addFieldToFilter('specialdeals_number', array('eq' => $num));
		
		foreach($collection as $c){
			
			return $c->getspecialdeals_color();
			
		}
    }

}