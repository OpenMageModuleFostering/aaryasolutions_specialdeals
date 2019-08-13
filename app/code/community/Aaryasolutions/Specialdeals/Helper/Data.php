<?php
class Aaryasolutions_Specialdeals_Helper_Data extends Mage_Core_Helper_Abstract {
	public function getOrdersList($val) {
		$resource = Mage::getSingleton ( 'core/resource' );
		$readConnection = $resource->getConnection ( 'core_read' );
		$query = "SELECT o.entity_id, i.order_id, o.increment_id, i.product_id, o.status, i.qty_ordered  FROM sales_flat_order o inner join sales_flat_order_item i on o.entity_id = i.order_id WHERE i.product_id=" . $val . " AND o.status='complete'";
		
		$results = $readConnection->fetchAll ( $query );
		
		return $results;
	}
	public function getQtyTotal($val) {
		$qty = 0;
		
		$resource = Mage::getSingleton ( 'core/resource' );
		$readConnection = $resource->getConnection ( 'core_read' );
		$query = "SELECT o.entity_id, i.order_id, o.increment_id, i.product_id, o.status, i.qty_ordered  FROM sales_flat_order o inner join sales_flat_order_item i on o.entity_id = i.order_id WHERE i.product_id=" . $val;
		
		$results = $readConnection->fetchAll ( $query );
		
		foreach ( $results as $results ) {
			
			$qty = $qty + $results ['qty_ordered'];
			// code...
		}
		
		return $qty;
	}
}