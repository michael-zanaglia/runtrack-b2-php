<?php
    function my_fizz_buzz(int $size): array{
        $list = [];
        for($i = 1; $i <= $size; $i++){
            $ecriture = "";
            if($i % 3 === 0){
                $ecriture = "Fizz";
            }
            if($i % 5 === 0){
                $ecriture .= "Buzz";
            }
            
            $list[$i] = ($ecriture != "" ? $ecriture : $i);
        }
        return $list;
    }

    $res = my_fizz_buzz(100);
    var_dump($res);

?>