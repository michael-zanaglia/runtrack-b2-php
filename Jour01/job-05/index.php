<?php
    function my_is_prime(int $n) : bool {
        $occur = 0;
        for($b = 1; $b <= 100; $b++){
            if($n % $b === 0){
                $occur += 1;
            }
            if($occur >= 3){
                return false;
            }
        }
        return true;
    }

    $res1 = my_is_prime(3);
    $res2 = my_is_prime(12);

    echo 'Reponse à $res1 : '.($res1 ? 'true' : 'false').'<br>';
    echo 'Reponse à $res2 : '.($res2 ? 'true' : 'false').'<br>';
?>