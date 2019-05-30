<?php
	class Targaryen
	{
	  	public function resistsFire() 
	  	{
			return FALSE;
		}

	  	public function getBurned()
	  	{
			return ($this->resistsFire()) ? ("emerges naked but unharmed"): ("burns alive");
	  	}
	}  
?>