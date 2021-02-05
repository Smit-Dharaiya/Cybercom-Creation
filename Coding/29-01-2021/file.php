<?php
    //writing file
    $handel = fopen('friends.txt','w');
    fwrite($handel,'Smit');
    fwrite($handel,' Dharaiya '."\n");
    fwrite($handel,'Poojan '."\n");
    fwrite($handel,'Dharaiya'."\n");
    fwrite($handel,'kapil bhatt'."\n");
    fclose($handel);

    //appending to file
    $handel = fopen('friends.txt','a');
    fwrite($handel,'Hinsu');
    fwrite($handel,' Dirgh Jani '."\n");
    fwrite($handel,'Shubham '."\n");
    fwrite($handel,'MOhit'."\n");
    fclose($handel);

    //reading from file
    $readin = file('friends.txt');
    $readinCount = count($readin);
    $count = 1;
    foreach ($readin as $name){
        echo trim($name);
        if($count < $readinCount){
            echo ", ";
        }
        $count++;
    }
    
    //explode data
    $filename = 'friends.txt';
    $handel = fopen($filename,'r');
    $data_in = fread($handel, filesize($filename));
    $names_arr = explode("\n", $data_in);
    echo "<br>";
    print_r($names_arr);
    
    foreach($names_arr as $name){
        echo $name.'<br>';
    }

    //implode data
    $filename = 'friends.txt';
    $handel = fopen($filename,'r');
    $data_in = fread($handel, filesize($filename));
    $names_arr = implode('-', (array)$data_in);
    echo "<br>";
    print_r($names_arr);
    
    foreach((array) $names_arr as $name){
        echo '<br>'.$name.'<br>';
    }
?>