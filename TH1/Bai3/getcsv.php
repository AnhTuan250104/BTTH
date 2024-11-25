<?php

$filename = "KTPM2.csv";


$users = [];


if (file_exists($filename) && ($handle = fopen($filename, "r")) !== FALSE) {
    
    $headers = fgetcsv($handle, 1000, ",");

  
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
   
        if (count($data) == count($headers)) {
            $users[] = array_combine($headers, $data); 
        }
    }

    fclose($handle);
} else {
    echo "Không thể mở tệp CSV.";
}


?>
