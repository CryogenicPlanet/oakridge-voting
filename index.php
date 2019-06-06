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
</div>
</div>
  <div id="loginForm">
      <div class="row">
      <div class="col s8 offset-s2">
        <div class="card-panel white darken-3">
          <div class="row">
            <div class="col s6"><div class="col s4"> <img src="logo.png" alt="" class="responsive-img"></div> <h1>Elections 2017</h1></div>
         
            
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
            </div>
            </div>
            </div>
            </div>
            <div id="voting">
               <form action="Javascript:addVotes()">
                 <div class="container">
                   <div class="row"><div class="col s8 offset-s2"><div class="col s3"> <img src="logo.png" alt="" class="responsive-img"></div> <h1>Elections 2017</h1></div></div>
         
        
                  
      <?php
        if ($result->num_rows > 0) {
    // output data of each row
     $true = true;
    while($row = $result->fetch_assoc()) {
      if($row['PID'] == 1 || $row['PID'] == 2){
        if ($row['PID'] == 1) {
          
        echo '<div class="row">
        <div class="col s12">
          <div class="card white z-depth-4">
            <div class="card-content black-text">
              <span class="card-title" id="headboy">Head Boy</span>
              <div class="row">
                <div class="col s6 black-text">
                <div class="col s4"><img class="circle responsive-img" src="images.png"></div>
                    <input  name="post'.$row['PID'].'" type="radio" id="headboy1" value="1"   class="validate" />
      <label for="headboy1">'. $row['Cname1']. '</label></div>
                
                <div class="col s6 black-text">
                 <div class="col s4">  <img class="circle responsive-img" src="4144-icons_candidate.png"> </div>
                    <input name="post'.$row['PID'].'" type="radio" id="headboy2" value="2" class="validate" />
      <label for="headboy2">'. $row['Cname2']. '</label></div>
                </div>
              </div>
         </div>
          
            </div>
        </div><div class="divider"></div>
          ';
        } else{
          echo '
          <div class="row">
          <div class="col s12">
          <div class="card white z-depth-4">
            <div class="card-content black-text">
              <span class="card-title" id="headgirl">Head Girl</span>
              <div class="row">
                <div class="col s6 black-text">
                <div class="col s4"><img class="circle responsive-img" src="images.png"></div>
                    <input  name="post'.$row['PID'].'" type="radio" id="headgirl1" value="1"   class="validate" />
      <label for="headgirl1">'. $row['Cname1']. '</label></div>
                
                <div class="col s6 black-text">
                 <div class="col s4">  <img class="circle responsive-img" src="4144-icons_candidate.png"> </div>
                    <input name="post'.$row['PID'].'" type="radio" id="headgirl2" value="2" class="validate" />
      <label for="headgirl2">'. $row['Cname2']. '</label></div>
                </div>
              </div>
         </div>
          
            </div>
          </div>
      <div class="divider"></div>';
        }
      } else {
        if($true == true){
           echo '<div class="row">
        <div class="col s6">
          <div class="card white z-depth-3">
            <div class="card-content black-text">
              <span class="card-title"id="post'.$row['PID'].'">'. $row['Pname'].'</span>
              <div class="row">
                <div class="col s6 black-text">
                <input name="post'.$row['PID'].'" type="radio" id="post'.$row['PID'].'-a"  value="1" class="validate" />        
      <label for="post'.$row['PID'].'-a">'. $row['Cname1']. '</label></div>
                
                <div class="col s6 black-text">
                    <input name="post'.$row['PID'].'" type="radio" id="post'.$row['PID'].'-b" class="validate" value="2"/>
      <label for="post'.$row['PID'].'-b">'. $row['Cname2']. '</label></div>
                </div>
              </div>
         </div>
          
            </div>
          ';
          $true = false;
        } else {
          echo '
        <div class="col s6">
          <div class="card white  z-depth-3">
            <div class="card-content black-text">
              <span class="card-title"id="post'.$row['PID'].'">'. $row['Pname'].'</span>
              <div class="row">
                <div class="col s6 black-text">
                
                    <input name="post'.$row['PID'].'" type="radio" id="post'.$row['PID'].'-a"  value="1" class="validate" />        
      <label for="post'.$row['PID'].'-a">'. $row['Cname1']. '</label></div>
                
                <div class="col s6 black-text">
               
                    <input name="post'.$row['PID'].'" type="radio" id="post'.$row['PID'].'-b" class="validate" value="2"/>
      <label for="post'.$row['PID'].'-b">'. $row['Cname2']. '</label></div>
                </div>
              </div>
         </div>
          
            </div>
          </div><div class="divider"></div>';
          $true = true;
        }
     
    }
    }
          
        }
      ?>
            
                <div class="row">
                  <div class="col s12"><button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button></div> 
                </div>
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
       var username;
        var password;
        var isTrue = 0;
        var noTime = 0;
    function Login() {
     username = document.getElementById("userid").value;
       password = document.getElementById("userpwd").value;
        
        console.log(username + password);
         $.ajax({
          type : "POST",
          datatype : "json",
          url : "/password.php",
          data : {
            password : password
          },
          success: function(data){
           
  if (data == 1){ 
     console.log(data);
    isTrue = 1;
    } else {
      isTrue = 2;
    }
  }
          });
        
         var sha256 = new jsSHA('SHA-256', 'TEXT');
      sha256.update(password);
        var hash = sha256.getHash("HEX");
        window.setTimeout(waitAjax(),2000);
        function waitAjax(){
       
          if (username == "admin") {
            checkin(hash);
            
          } else if(username =="voting"){
            console.log("inside voting");
            if (isTrue == 1) {
              checkin(hash);
            } else if (isTrue != 0) {
             Materialize.toast('Wrong Password', 4000);
            
          } else {
            if (noTime == 0) {
               Materialize.toast('Logining In Please Wait...', 2000);
            }
            noTime++;
            window.setTimeout(waitAjax,2000);
          }
          } else {
             Materialize.toast('Wrong Password', 4000);
            
          }
          
        }
    }
       function checkin(hash){
         var date = new Date();
        var hour = date.getHours();
         console.log("in checkin");
        if  (username === "admin" && hash === "904724b3ec8d73fd2e9c0cbef4d2bf8e160f14ad73f3b7081e7b4ae811d84c96" ) {
          document.getElementById("loginForm").style.display = 'none';
          document.getElementById("voting").style.display = 'block';
        } else if ((username === "voting" && isTrue == 1) && (hour > 8 && hour < 15)){
          document.getElementById("loginForm").style.display = 'none';
          document.getElementById("voting").style.display = 'block';
        }
        else {
          console.log("wrong password")
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
   echo "var notVoted = false;";
       if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo 'var vote' . $row['PID'] . '= "";
      if(!(document.querySelector("input[name='."'post".$row['PID']."'".']:checked"))){
          if(notVoted == false){
          Materialize.toast("Please Fill All the Votes Before Submiting", 1000);
          notVoted = true;
          } 
      } else {
        vote' . $row['PID'] . ' = document.querySelector("input[name='."'post".$row['PID']."'".']:checked").value
      }
      console.log(vote'.$row['PID'].') ; 
      ';
      
    }
       }
       echo 'console.log("Pre ajax");
       if(notVoted == false){
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
  console.log(data)
  if (data){
     Materialize.toast("Succesfully Voted", 10000);
      window.location = "/index.php";
    }
  }
        }); } ';
    echo ' }</script>';
      ?>
      
    </body>
  </html>
