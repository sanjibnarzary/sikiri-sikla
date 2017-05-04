<?php
    session_start();
    $counter_name = "counter.txt";
//var_dump(is_file($counter_name));
    // Check if a text file exists. If not create one and initialize it to zero.
    /*if (!file_exists($counter_name)) {
        $f = fopen($counter_name, "w") or die('failed to open file');
        fwrite($f,"0");
        fflush($f);
        fclose($f);
    }
    */
    // Read the current value of our counter file

    try {
        $f = fopen($counter_name,"r");
        $counterVal = fread($f, filesize($counter_name));
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
    fflush($f);
    fclose($f);
    // Has visitor been counted in this session?
    // If not, increase counter value by one

    if(!isset($_SESSION['hasVisited'])){
        $_SESSION['hasVisited']="yes";
        $counterVal = $counterVal+1;

        try {

            $f = fopen($counter_name, "w") or die('failed to open file 2');
            fwrite($f, $counterVal);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        fflush($f);
        fclose($f);
    }
    echo $counterVal;