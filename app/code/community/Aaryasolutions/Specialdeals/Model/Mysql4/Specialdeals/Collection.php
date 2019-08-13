<?php
class Aaryasolutions_Specialdeals_Model_Mysql4_Specialdeals_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract {
	public function _construct() {
		parent::_construct ();
		$this->_init ('specialdeals/specialdeals');
	}
}