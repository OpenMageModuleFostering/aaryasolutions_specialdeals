<?php
class Aaryasolutions_Specialdeals_IndexController extends Mage_Core_Controller_Front_Action {
	public function indexAction() {
		$this->loadLayout ();
		$this->renderLayout ();
	}
}