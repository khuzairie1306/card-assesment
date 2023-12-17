<?php

    header('Access-Control-Allow-Origin: http://localhost:3000');
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Disposition, Content-Type, Content-Length, Accept-Encoding");
    header("Content-type:application/json");
   
    $PeopleDistributeNumber = $_POST['PeopleDistribute'];

    $filtered = filter_var($PeopleDistributeNumber, FILTER_VALIDATE_INT);

    if ($filtered !== false) 
    {
        $symbolscard = array('S','H','D','C');    
        //Card 2 to 9 are, as it is, 1=A,10=X,11=J,12=Q,13=K
        $valcard = array('A','2','3','4','5','6','7','8','9','X','J','Q','K');
        $cards = array();
        $fincard = array();
        foreach($symbolscard as $symbols) {
            foreach($valcard as $vals) {
                $cards[] = $symbols."-".$vals;
            }
        }

        shuffle($cards);
        foreach ($cards as $card) {
            //  "$card ";
            $fincard[] = $card;
        }
      

         $totalcard = count($cards);

        // $keys = array_keys($cards);

        // shuffle($keys);

        // foreach($keys as $key) {
        //     $newrandomcard[$key] = $cards[$key];
        // }

        $finalcard = $fincard;

        // // sprint_r($array);
        // $totalcard = count($finalcard);
        
        $totalcardperson = floor($totalcard / $PeopleDistributeNumber);
        // echo $totalcardperson;
        // exit;
        if ($totalcardperson == 0)
            $totalcardperson = 1;
        $finalresult = array();
        $art = array();
        for($i = 0; $i < $PeopleDistributeNumber; $i++) {
            $countperson = $i+1;
            // echo 'Person'.$countperson;
             $finalresult = 'Person'.($i + 1).' => ';
            for($j = $i * $totalcardperson; $j < ($i + 1) * $totalcardperson; $j++) {
                if ($j < 52) {
                    $finalresult .= $finalcard[$j].',';
                    unset($finalcard[$j]);
                }
            }
            // $finalresult .= '<br/>';
            $art[] = $finalresult;
        }
        $myArray = 
        json_encode($art);

        echo $myArray;
        

        
        // $my_array = array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow","e"=>"purple");

        // shuffle($my_array);
        // var_dump($my_array);


        // $shuffled = array_rand($cards);
        // $v = array[$shuffled];
        // print_r($v);

        

        
    } else {
        echo("Variable is not an integer");
    }

    // echo ("Hello from server: $PeopleDistributeNumber");
?>