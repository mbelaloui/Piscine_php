<?php 
    function ft_is_sort($tab)
    {
        $temp = $tab;
        $len_tab = count($tab);
        sort($temp);
        for ($index = 0; $index < $len_tab; $index++)
            if ($tab[$index] != $temp[$index])
                return (false);
        return (true);
    }
?>
