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
      <!-- 
      <h1><center>Oakridge Voting System</center></h1>
      <table align=center frame="border">
        <tbody>
          <tr><td><center> <h4>Log-in</h4></center></td></tr>
            <form method="POST" method="voting.php"> 
            <tr><td>Username:<input id= user type="text" name="userid"></td></tr>
            <tr><td>Password:<input id= user type="password" name="userpwd"></td></tr>
            <tr><td><center><button id=submit type=submit>Submit</button></center><td></tr>
            </form>
        </tbody>
      </table> --> 
      
    <div class="row">
      <div class="col s6 offset-s3">
        <div class="card-panel teal">
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
        </div>
      </div>
    </div>
    <script>
    function Login() {
    var username = document.getElementById("userid").value;
        var password = document.getElementById("userpwd").value;
        console.log(username + password);
      //  var date = new Date();
       // var hour = date.getHours();
       var hour = 12;
         var sha256 = new jsSHA('SHA-256', 'TEXT');
      sha256.update(password);
        var hash = sha256.getHash("HEX");
        console.log(hash); 
        if  (username === "admin" && hash === "904724B3EC8D73FD2E9C0CBEF4D2BF8E160F14AD73F3B7081E7B4AE811D84C96" ) {
          document.getElementById("loginForm").style.display = 'none';
        } else if ((username === "voting" && hash === "3ab4f1d4a5eb2f8b5db6b0cf2edc64d7635ad7335dbd2af1b0ee99433da85b01") && (hour > 8 && hour < 15)){
          document.getElementById("loginForm").style.display = 'none';
        }
        else {
           Materialize.toast('Wrong Password', 4000)
        }
    }
    </script>
      
    </body>
  </html>
