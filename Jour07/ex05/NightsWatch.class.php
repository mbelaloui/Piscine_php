<?php
	class NightsWatch implements IFighter
	{
		private $garde;

		public function recruit($personne)
		{
			if ($personne instanceof IFighter)
				$this->garde[] = $personne;
		}

		public function fight()
		{
			foreach ($this->garde as $key => $value) 
				$value->fight();
		}
	}
?>