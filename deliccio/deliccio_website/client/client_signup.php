<!DOCTYPE html>

<?php
 include_once 'include/config.php';
 if(isset($_REQUEST["lid"])==1)
{
     session_unset();

//    unset($_SESSION["clientId"]);
//    for($i=0;$i<1000;$i++)
//    {
//        if(isset($_SESSION["cart.$i"]))
//        {
//                unset($_SESSION["cart".$i]);
//    
//        }
//    
//    }}
 //include_once 'include/business_logic.php';
}
 ?>


<html lang="en">
<head>
<title>Deliccio | Sign up</title>
<meta charset="utf-8">
<?php
 include_once 'include/header.php';
?>

<!--<style>
span
{
    font-weight:bold;
}
    
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
</head>

<body id="page2">
<div class="body6">
  <div class="body1">
    <div class="main">
        
        <!-- header -->
        <header>
            
            <h1><a href="index.php" id="logo">Deliccio Fresh Fast Tasty</a></h1>
        
            <nav >
                <ul id="top_nav">
                <?php
                    if(!isset($_SESSION["clientId"]))
                    {
                       echo'<li><a href="client_login.php"><font color="white" face="verdana">Login</font></a></li>';
                    }
                    else
                    {
                        echo'<li><a href="index.php?lid=1"><font color="white" face="verdana">Logout</font></a></li>';
                    }
                ?>
              </ul>
            </nav>
          
            <nav>
            <ul id="menu">
              <li ><a href="index.php">Restaurant</a></li>
              <li class="active"><a href="cuisine.php">Cuisine</a></li>
              <li><a href="beverages.php">Beverages</a></li>
              <li><a href="dessert.php">Dessert</a></li>            
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
                    <h2>User <span>Sign Up</span></h2>
                    <form action="thank_you.php" name="frm_signup" id="frm_signup" method="post">
                        
                        <input type="text" name="uf" required="required" placeholder="First name" />
                        <input type="text" name="ul" required="required" placeholder="Last name" />
                        <input type="email" name="e" required="required" placeholder="E-mail"/>
                        <input type="password" name="p" required="required" placeholder="Password" />
                        <input type="text" name="ad" required="required" placeholder="Address">
                        <input type="tel" title="Phone number with 7-9 and remaing 9 digit with 0-9" pattern="[7-9]{1}[0-9]{9}" name="ph" id="ph" required="required" placeholder="Contact no." size="10"/>
                     <!--   <span id="spnPhoneStatus"></span>
                        <script>
                        //Code Starts
                            $('#ph').blur(function(validatePhone) {
                                   });
                            //Code Ends
                        </script>
     
                    <script>
                    //phone no. validation
                        $(document).ready(function()
                        { 
                            $('#ph').blur(function(e) 
                            {
                                if (validatePhone('ph'))
                                {
                                  $('#spnPhoneStatus').html('Valid');
                                   $('#spnPhoneStatus').css('color', 'green');
                                }
                               else {
                                  $('#spnPhoneStatus').html('Invalid');
                                  $('#spnPhoneStatus').css('color', 'red');
                               }
                            });
                        });
                        
                        function  validatePhone(ph) 
                        {
                            var a = document.getElementById(ph).value;
                            var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
    
                            if (filter.test(a))
                            {
                                return true;
                            }
                            else
                            {
                                return false;
                            }
                        }​
                   
                        //Code Ends

                    </script>
-->                                      <br>
                        <input type="submit" name="btnsave" value="Sign Up">
                    
                    </form>
      
                </div>
            </div>
          </section>
            

        </div>
      </article>
    </div>
  </div>
</div>

    <!-- / content -->
  </div>
</div>
<div class="body3">
  <div class="body4">
    <div class="main">
        <?php
        include_once'include/footer.php';
        ?>
  </div>
</div>
<script>Cufon.now();</script>
</body>
</html>