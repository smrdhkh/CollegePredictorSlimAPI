<?php
include_once 'include\config.php';
?>

<?php

    if(isset($_POST["btnlogin"]))
    {
        $cl=new clsclient ();
        
        $cl->email=$_POST["txtemail"];
        $cl->pwd=$_POST["txtpassword"];
        //echo $cl->pwd;
        
        $result=$cl->Login_Client();
        //  echo $result;
       if($result=="Logged in")
        {
            
            $con=new clscon();
            $link=$con->db_connect();
            
            $qry="select * from tb_client where email='$cl->email'";
            $res=  mysqli_query($link, $qry);
            $r=  mysqli_fetch_row($res);
            $d=$r[0];

                // echo $d;
               //setting the session variables
            $_SESSION["clientId"]=$r[0];
            $_SESSION["cart"]="";
            //redirecting to index.php
           header('Location:index.php');
        
          // echo $d;
            echo '<script language="javascript">';
            echo 'alert("Logged in")';
            echo '</script>';

            
        }
        else if($result=="Wrong Email")
        {
            echo '<script language="javascript">';
            echo 'alert("Wrong E-mail")';
            echo '</script>';
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("Wrong Password")';
            echo '</script>';
        }
        //alert box
            }

?>

<!DOCTYPE html>

<html lang="en">

    <!--head-->
    <head>
        <title>Deliccio | Login</title>
        <meta charset="utf-8">
        <?php
        include_once 'include/header.php';
        ?>
    </head>
    
    <!--body-->
        <body id="page2">
            
            <div class="body6">
                <div class="body1">
                    <div class="main">

                    <!-- header -->
                    <header>
                        <h1><a href="index.php" id="logo">Deliccio Fresh Fast Tasty</a></h1>
                         <nav>
                            <ul id="top_nav">
                                <li><a href="client_signup.php"><font color="white" face="verdana">Sign up</font></a></li>
                            </ul>
                        </nav>
         
                        <nav>
                            <ul id="menu">
                                <li ><a href="index.php">Restaurant</a></li>
                                        <li class="active"><a href="cuisine.php">Cuisine</a></li>
                                        <li><a href="beverages.php">Beverages</a></li>
                                        <li><a href="dessert.php">Dessert</a></li>';
                                
                            </ul>
                      </nav>
                    </header>
                    <!-- / header -->
              
                    <!-- content -->
                    <article id="content">
                        <div class="wrap">
                            <section class="cols">
                                <div class="box">
                                    <div align="center">
                                        <h2>User <span>Login</span></h2>
                                        <form id="form_login" action="client_login.php" method="post">
                                            
                                                <input type="text" id="txtemail" name="txtemail" placeholder="Email" />
                                                <input type="password" id="txtpassword"  name="txtpassword" placeholder="Password"/>
                                                <br>
                                                <input type="submit" value=" Login" name="btnlogin"/>
                                                
                                        </form>
                                    </div>
                                </div>
                            </section>
                           <!-- <div align="center"><form id="form_login"><!--form content here--></form></div>-->
                    </div>
                </div>
              </div>

            <!-- / content -->
            <div class="body3">
                <div class="body4">
                    <div class="main">
                        <!-- footer -->
                    
                        <?php
                                include_once 'include/footer.php';
                        ?>
                        <!-- / footer -->
                    </div>
                </div>
            </div>    
        
            <script>Cufon.now();</script>
        </body>

</html>

