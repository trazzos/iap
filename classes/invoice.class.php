<?php

class Invoice extends Util
  {
protected $page;

	function Config($id)
	{
		
		$this->Util()->DB()->setQuery("SELECT * FROM invoice  where invoiceId='".$id."' ");
		$result = $this->Util()->DB()->GetRow();
		return $result;
			
		
		
	}	

}
?>