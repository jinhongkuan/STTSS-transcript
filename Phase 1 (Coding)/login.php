<?php
$FAILURE = FALSE;
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST["id"];
    $password = $_POST["password"];

    $server_host = "sql12.freemysqlhosting.net";
    $sql_name = "sql12218230";
    $sql_password = "X2gGvTDMZH";
    $sql_db = "sql12218230";
    $sql_table = "login_table";
    $conn = new mysqli($server_host, $sql_name, $sql_password, $sql_db);
    if ($conn->connect_error == TRUE)
    {
        echo "Error login";
        return FALSE;
    }
    $query = "SELECT ID from $sql_table WHERE USERNAME='$username' and PASS = '$password'";
    $result = $conn->query($query);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows==1)
    {
        echo "Welcome!";
    }else{
        $FAILURE = TRUE;
    }
}

?>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Corben:700" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <script>
  </script>
  <style>
    #bg{
      z-index: -1;
      min-height: 100%;
      min-width: 1024px;

      width: 100%;
      height: auto;

      position: fixed;
      top: 0;
      left: 0;
     }

@media screen and (max-width: 1024px) {
#bg {
  left: 50%;
  margin-left: -512px;
}
    }
    #box{
      background: rgba(255,255,255,0.6);
      position:absolute;
      top:50%;
      left:50%;
      transform: translate(-50%,-50%);
    }
    @media screen and (min-width: 900px){
      #box{
        height:auto;
        width:40%;
      }
    }
    .btn{
        font-family: Corben;
      }
      #alert{
        color:red;
        font-size:14px;
      }
  </style>
</head>
<body>
  <div class="container-fluid jumbotron" id="box">
    <p>STTSS Transcript</p>
  <form id="login-form" action="login.php" method="POST">
    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" placeholder="Enter id" class="form-control" name="id">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" placeholder="Enter password" class="form-control" name="password">
      </div>
      <p class=<?php if ($FAILURE==TRUE) {echo 'visible';} else {echo 'hidden small';} ?>  id="alert">*ID or password is incorrect*</p>
      <button type="submit" form="login-form" class="btn btn-block" id="loginbtn"><span class="fa fa-sign-in"></span>
        Login</button>
  </form>
  </div>
  <img src="#" id="bg">
</body>
</html>
