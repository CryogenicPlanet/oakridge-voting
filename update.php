<?php
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
    $sucess; $number;
     $sql = "SELECT * FROM Posts";
   $result = $db->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $number ++;
        $CID = $_POST[$row['PID']];
        $voteFor = "Votes" . $CID;
        $votes = $row[$voteFor] + 1;
        $sql = "UPDATE  Posts SET " . $voteFor . "='". $votes ."' WHERE PID=" . $row['PID'];
        

if ($db->query($sql) === TRUE) {
   $sucess++;
} else {
    echo "Error updating record: ". $sql . "CID , Votes" . $CID . $votes ;
}
    }
   
    }
     if ($sucess == $number) {
        $array = ["isTrue" => true];
        echo json_encode( $array );
    }
?>