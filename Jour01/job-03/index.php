<?php
    function my_is_multiple(int $divider, int $multiple) : bool {
        return ($multiple % $divider) === 0 ;
    }

    $res1 = my_is_multiple(2,4);
    $res2 = my_is_multiple(2,5);

    echo "Reponse 1 : ". ($res1? 'true' : 'false') .'<br>';
    echo "Reponse 2 : ". ($res2? 'true' : 'false') .'<br>';
?>