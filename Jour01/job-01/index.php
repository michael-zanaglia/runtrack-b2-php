<?php
    function my_str_search(string $letter, string $myStr) : int {
        $count = 0;
        for($i = 0; $i < strlen($myStr); $i++){
            if($myStr[$i] === $letter){
                $count++;
            }
        }
        return $count;
    }


    $res = my_str_search('a', 'Bonjour, LaPlateforme !');    
    echo $res;
?>