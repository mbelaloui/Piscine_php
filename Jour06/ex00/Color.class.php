<?php

class Color
{
	private function strHexToInt($val)
	{
		$temp = intval($val, 16);
		$r = 0xFF & ($temp >> )
		print($temp);
		print("\nfini\n");
	}

	public function __construct(array $arg)
	{
		if (array_key_exists('rgb', $arg))
		{	print("rgb\n");
			$this->strHexToInt($arg['rgb']);
			print_r($arg);
		}else{
			print("r, g, b\n");
			print_r($arg);
		}	
		$r = 1;
		$g = 2;
		$b = 4;
		$this->red = $r;
		$this->green = $g;
		$this->blue = $b;
	}

	public function __destruct()
	{
		print("finish destructed");
	}

	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public static $verbose = False;
}

$val = array();
$val["rgb"] = "0x554433"; 
$color = new Color($val);

$temp = array();
$temp["red"] = 2;
$temp["blue"] = 4;
$temp["green"] = 33;
$c = new Color($temp);


?>

