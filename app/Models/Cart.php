<?php
namespace App\Models;

class Cart{

	private $listCartItem=null;
	private $totalQuantity =0;
	private $grandTotal=0;

	public function __construct($oldCart){
		if ($oldCart) {
			# code...
			$this->listCartItem = $oldCart->listCartItem;
			$this->totalQuantity = $oldCart->totalQuantity;
			$this->grandTotal = $oldCart->grandTotal;
		}
	}

	public function getListCartItem(){
		return $this->listCartItem;
	}
	public function setListCartItem($listCartItem){
		$this->listCartItem = $listCartItem;
	}

	public function getTotalQuantity(){
		return $this->totalQuantity;
	}
	public function setTotalQuantity($totalQuantity){
		$this->totalQuantity = $totalQuantity;
	}

	public function getGrandTotal(){
		return $this->grandTotal;
	}
	public function setGrandTotal($grandTotal){
		$this->grandTotal = $grandTotal;
	}
}

?>