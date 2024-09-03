<?php
    function closest_to_zero(array $myList) : int{
        $len = count($myList);
        $closestCarre = $myList[0]**2;
        $closest = $myList[0];
        foreach($myList as $number){
            $currentNumberPuissance2 = $number * $number;
            if ($currentNumberPuissance2 < $closestCarre){
                $closestCarre = $currentNumberPuissance2;
                $closest = $number;
            }
        }  
        
        
        
        return $closest;       
    }

    $res = closest_to_zero([2,-1,5,23,21,9,100]);
    $res2 = closest_to_zero([234,-142,512,1223,451,-59,58]);

    echo "La premiere liste, le plus proche de zero est : ".$res.'<br>';
    echo "La deuxieme liste, le plus proche de zero est : ".$res2.'<br>';
?>