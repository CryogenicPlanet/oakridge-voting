<?php
$isTrue = false;
$passwordFromPost = $_REQUEST['password'];

$servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);
     // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    
    $sql = "SELECT isTrue FROM Password WHERE Password ='" . $passwordFromPost . "'";
 
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($row['isTrue'] == 0){
            $sql2 = "UPDATE Password SET isTrue =1 WHERE Password ='". $passwordFromPost . "'";
        
            if ($db->query($sql2) === TRUE) {
            $isTrue = true;
            echo 1;
} else {
    echo 0 ;
}
          
        }
    }
    }
if ($isTrue == false){
    echo  0;
}    
    ?>