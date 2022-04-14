<?php
include "config.php";


if(isset($_POST['but_submit'])){

    // Get Username and Password from the form's input

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);


    if ($uname != "" && $password != ""){
        // Condition about the Form's Data and Database's Data
        $sql_query = "select count(*) as cntUser from AccountsRegister where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            // Starting session which form input's username equal to database's username
            header('Location: home.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
?>
<html>
    <head>
        <title>Login</title>
  <style>
        .container {
            margin-top: 80px;
        }

.containersignin{
    margin-bottom: 200px;
}


body {
  background-color: pink;

}   
</style> 
    </head>
    <body>
        <div class="container">
            <center>
        <img src="image/image1.jpg">
            <form method="post" action="">
                <div id="div_login">
                    <h1>Login</h1>
                    <div>
                        <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
                    </div>
                    <div>
                        <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password"/>
                    </div>
                    <div>
                        <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                    </div>
                </div>
            </form>
            <p>Don't you have a membership? <a href="index.php">Create an Account</a></p>
            
    </center>
        </div>
    </body>
</html>

