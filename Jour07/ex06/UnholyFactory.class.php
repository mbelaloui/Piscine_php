<?php

    class UnholyFactory
    {
        private $arrayCrippledSolier;
        
        function absorb($solier)
        {
            if (empty($this->arrayCrippledSolier) || !in_array($solier, $this->arrayCrippledSolier))
            {
                if (get_parent_class($solier) === "Fighter")
                {
                    print("(Factory absorbed a fighter of type ".$solier->type.")".PHP_EOL);
                    $this->arrayCrippledSolier[] = $solier;
                }else
                    print("(Factory can't absorb this, it's not a fighter)".PHP_EOL);
            }else
                print("(Factory already absorbed a fighter of type".$solier->type.")".PHP_EOL);
        }

        function fabricate($arg)
        {
            foreach ($this->arrayCrippledSolier as $key => $solier)
            {
                if ($solier->type === $arg)
                {
                    print("(Factory fabricates a fighter of type ".$arg.")".PHP_EOL);
                    return $this->arrayCrippledSolier[$key];
                }
            }
            print("(Factory hasn't absorbed any fighter of type ".$arg.")".PHP_EOL);
        }
    }
?>