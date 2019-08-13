<?php
class Aaryasolutions_Specialdeals_Block_Specialpriceproducts extends Mage_Core_Block_Template {
	protected function _construct() {
		parent::_construct ();
		$this->_blockGroup = 'specialdeals';
		
		$this->setTemplate ( 'specialdeals/homewidget.phtml' );
	}
	protected function _toHtml() {
		return parent::_toHtml ();
	}
	public function listSpecialProductsByPrice($price, $admin = null) {

		
		
		$_productCollection = Mage::getModel ('catalog/product')->getCollection ()->setStoreId(1);
		
		$_productCollection->addAttributeToSelect ('*');
		$_productCollection->addAttributeToSelect ('name');
		
		$_productCollection->addFieldToFilter ('visibility', array (
				Mage_Catalog_Model_Product_Visibility::VISIBILITY_BOTH,
				Mage_Catalog_Model_Product_Visibility::VISIBILITY_IN_CATALOG 
		)); // showing just products visible in catalog or both search and catalog
		
		
		
		$_productCollection->addFinalPrice()->getSelect()
									    ->where ('price_index.final_price < price_index.price and price_index.final_price=' . $price)
										->group ('e.entity_id');
		
		return $_productCollection;
	}
	public function getPerTabhtml($bin) {
		$this->getChild ('specialproducts')->setData ('bin', $bin);
		
		return $this->getChildHtml('specialproducts', false );
	}
}