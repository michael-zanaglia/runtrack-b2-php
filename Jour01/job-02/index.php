<?php
    function my_str_reverse(string $myStr) : string {
        $reverse = "";
        for($i = strlen($myStr) -1; $i >= 0; $i--){
            $reverse .= $myStr[$i];
        }
        return $reverse;
    }


    $res = my_str_reverse('Hello');    
    echo $res;
?>