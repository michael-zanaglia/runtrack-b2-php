<?php
    function my_array_sort(array $myList, string $order) : array {
        $len = count($myList);
        for($i = 0; $i < $len - 1; $i++){
            for($j = 0; $j < $len - $i - 1; $j++){
                if($myList[$j] > $myList[$j+1] && $order === "ASC"){
                    $val = $myList[$j];
                    $myList[$j] = $myList[$j+1];
                    $myList[$j+1] = $val;
                }
                if ( $myList[$j] < $myList[$j+1]  && $order === "DESC"){
                    $val = $myList[$j];
                    $myList[$j] = $myList[$j+1];
                    $myList[$j+1] = $val;
                }
            }
        }  
        return $myList;
    }

    $res = my_array_sort([2,24,12,7,34], 'ASC');
    $res2 = my_array_sort([8,5,23,89,6,10], 'DESC');

    var_dump($res);
    var_dump($res2);
?>