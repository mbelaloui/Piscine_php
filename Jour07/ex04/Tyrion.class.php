<?php
	  class Tyrion extends Lannister
	  {
	  	public function sleep($obj_clas)
		{
			if (get_parent_class($obj_clas) !== "Lannister")
				return("Let's do this");
			else
				return("Not even if I'm drunk !");
		}
	  }  
?>
