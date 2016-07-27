<?php 
include_once 'include/config.php';
$_SESSION['clientId'] = 1;
if ( !isSet( $_SESSION['clientId'] ) )
{
	header('Location: login.php');
}
?>
<!DOCTYPE html>

<html lang="en">

    <!--head-->
    <head>
        <title>Deliccio | Customer</title>
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
                        <article id="content">
                        <div class="wrap">
                            <section class="cols">
                                <div class="box">
                                    <div align="center">
                                        <h1>Customers</h1>
<?php 		
echo '
<table border="3">
<tr>

<th>NAME</th>
<th>PASSWORD</th>
<th>EMAIL</th>
<th>ADDRESS</th>
<th>PHONE NO</th>
<th>ACTION</th>
</tr>';
    $obj=new clsclient();
    $ar=$obj->Display_Client();
    for($i=0;$i<count($ar);$i++)
    {
        echo'<tr>';
       // echo"<td>"; echo $ar[$i][0]; echo"</td>";
	   echo "<td> <a href =\"updateClient.php?id=".$ar[$i][0]."\">"; echo $ar[$i][1]; echo"</a></td> ";
      //  echo"<td>"; echo $ar[$i][1]; echo"</td>";
        echo"<td>"; echo $ar[$i][2]; echo"</td>";
        echo"<td>"; echo $ar[$i][3]; echo"</td>";
        echo"<td>"; echo $ar[$i][4]; echo"</td>";
        echo"<td>"; echo $ar[$i][5]; echo"</td>";
        echo'<td><a href=delclient.php?cid='.$ar[$i][0].'>DELETE</a></td>';
        echo'</tr>';
    }
echo'</table>
    <br><br>';
					
?>
                                    </div>
                                </div>
                            </section>
                           <!-- <div align="center"><form id="form_login"><!--form content here--></form></div>-->
                    
                    
                    </div>
                </div>
              </div>
                    <!-- / header -->
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
