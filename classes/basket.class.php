<?php
		
	class Basket{
		
		var $items;
		
		function Basket()
		{
			$this->items=array();
		}//Basket
				  				
		function AddItem($subgpoId){
			    		
			$item 		=   array();
			$item[0]	=	$subgpoId;  
		                        			
			array_push($this->items,$item);
			
		}//AddItem
		 		
				
		function RemoveItem($subgpoId)
		{
			for($i=0;$i<count($this->items);$i++)
				if($this->items[$i][0]==$subgpoId)
				{				
					array_splice($this->items,$i,1);
					return 1;
				}					
			return 0;					
		}//RemoveItem
		
		function GetItems(){
			
			return $this->items;
			
		}
		
		function GetTotalItems(){
			
			return count($this->items);
			
		}
		
		function ExistItem($subgpoId){
			
			for($i=0;$i<count($this->items);$i++)
				if($this->items[$i][0]==$subgpoId)
				{					
					return 1;
				}					
			return 0;
			
		}//ExistItem
		
		function SetEmpty(){
			
			$this->items = array();
		
		}//Empty
		
		
	}
			
?>