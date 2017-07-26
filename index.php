<?php 
// Database conn

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
  $sql = "SELECT * FROM Posts";
   $result = $db->query($sql);
?>
<!DOCTYPE html>
  <html>
    <head>
   
         <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
         <script type="text/javascript" src="js/sha.js"></script>
        <!-- This is the base html to which just link to all the materializecss files. -->
      
    <div class="row">
      <div class="col s6 offset-s3">
        <div class="card-panel amber">
          <h1> Oakridge Voting System</h1>
            <div id="loginForm">
              <form action="Javascript:Login()">
                <div class="row">
                  <div class="input-field col s6">
                    <input placeholder="Username" id="userid" type="text" class="validate" required>
                    <label for="userid">Username</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="userpwd" type="password" class="validate" required>
                    <label for="userpwd">Password</label>
                  </div>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button>
                </form>
               
            </div>
            <div id="voting">
               <form action="Javascript:addVotes()">
                 <ul class="collection">
                  
      <?php
        if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($row['PID'] == 1 || $row['PID'] == 2){
        if ($row['PID'] == 1) {
        echo ' <div class="row">
                   <div class="col s4 offset-s4"><h1 id="headboy">Head Boy</h1></div>
                   
                 </div>
                 <div class="row">
                   <div class="col s6">  
                   <img class="responsive-img" src="http://www.headhuntersinc.com/media/340/headhuntinc_candidatesslider4.png">
      <input name="post'.$row['PID'].'" type="radio" id="headboy1" value="1"  required />
      <label for="headboy1">'. $row['Cname1']. '</label></div>
                 
    <div class="col s6">  
    <img class="responsive-img" src="http://futureindiaparty.org/wp-content/uploads/2013/08/The-Future-India-Party-_Candidates-blue.jpg">
      <input name="post'.$row['PID'].'" type="radio" id="headboy2" value="2"  />
      <label for="headboy2">'. $row['Cname2']. '</label></div>
      </div>';
        } else{
          echo '   <div class="row">
                   <div class="col s4 offset-s4"><h1 id="headgirl">Head Girl</h1></div>
                   
                 </div>
                 <div class="row">
                   <div class="col s6">  
                   <img class="responsive-img" src="http://www.headhuntersinc.com/media/340/headhuntinc_candidatesslider4.png">
      <input name="post'.$row['PID'].'" type="radio" id="headgirl1" value="1"  required />
      <label for="headgirl1">'. $row['Cname1']. '</label></div>
                 
    <div class="col s6">  
    <img class="responsive-img" src="http://futureindiaparty.org/wp-content/uploads/2013/08/The-Future-India-Party-_Candidates-blue.jpg">
      <input name="post'.$row['PID'].'" type="radio" id="headgirl2" value="2" />
      <label for="headgirl2">'. $row['Cname2']. '</label></div>
      </div>';
        }
      } else {
      echo '<div class="row">
        <div class="col s4 offset-s4"><h4 id="post'.$row['PID'].'">'. $row['Pname'].'</h4></div>
                   
                 </div>
                 <div class="row">
                   <div class="col s6">  
           <input name="post'.$row['PID'].'" type="radio" id="post'.$row['PID'].'-a"  value="1" required/>        
      <label for="post'.$row['PID'].'-a">'. $row['Cname1']. '</label></div>
                 
    <div class="col s6">  
      <input name="post'.$row['PID'].'" type="radio" id="post'.$row['PID'].'-b" value="2"/>
      <label for="post'.$row['PID'].'-b">'. $row['Cname2']. '</label></div>
      </div>';
    }
    }
          
        }
      ?>
                </uL>
                <div class="row">
                  <div class="col s4 offset-s4"><button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button></div> 
                </div>
    
  </form>
   </div>
            </div>
        </div>
      </div>
    </div>
    <script>
      document.getElementById("voting").style.display = 'none';
      console.log("in Js");
    function Login() {
    var username = document.getElementById("userid").value;
        var password = document.getElementById("userpwd").value;
        console.log(username + password);
        var date = new Date();
        var hour = date.getHours();
         var sha256 = new jsSHA('SHA-256', 'TEXT');
      sha256.update(password);
        var hash = sha256.getHash("HEX");
        console.log(hash); 
        if  (username === "admin" && hash === "904724b3ec8d73fd2e9c0cbef4d2bf8e160f14ad73f3b7081e7b4ae811d84c96" ) {
          document.getElementById("loginForm").style.display = 'none';
          document.getElementById("voting").style.display = 'block';
        } else if ((username === "voting" && hash === "3ab4f1d4a5eb2f8b5db6b0cf2edc64d7635ad7335dbd2af1b0ee99433da85b01") && (hour > 8 && hour < 15)){
          document.getElementById("loginForm").style.display = 'none';
          document.getElementById("voting").style.display = 'block';
        }
        else {
           Materialize.toast('Wrong Password', 4000);
        }
    }
    </script>
      <?php
      echo '<script>
       function addVotes() {
         
      ';
       $sql = "SELECT * FROM Posts";
   $result = $db->query($sql);
       if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo 'var vote' . $row['PID'] . ' = document.querySelector("input[name='."'post".$row['PID']."'".']:checked").value;
      console.log(vote'.$row['PID'].') ; 
      ';
      
    }
       }
       echo 'console.log("Pre ajax");
       $.ajax({
  type: "POST",
 datatype : "json",
	url: "/update.php",
  data: { ';
   $sql = "SELECT * FROM Posts";
   $result = $db->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo $row['PID']. ' : vote'.$row['PID'].' ,' ;
    }
    }

echo' password : 123456},
  cache: true,
  success: function(data){     
  console.log(data);
  if (data.isTrue){
     Materialize.toast("Succesfully Voted", 4000);
      window.location = "/index.html";
    }
  }
        }); ';
    echo ' }</script>';
      ?>
      
    </body>
  </html>
