<?php
    require ('steamauth/steamauth.php');  
?>

<!DOCTYPE html>
<html>
  <head>
      <link rel="stylesheet" href="styles.css">
      <script src="jquery-2.2.3.min.js"></script>
      <!-- Das neueste kompilierte und minimierte CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optionales Theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
      
      
<link rel="stylesheet" href="button.css">
    <link rel="stylesheet" href="sweetalert.css">
<link rel="stylesheet" type="text/css" href="table.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>

<!-- Das neueste kompilierte und minimierte JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://use.fontawesome.com/e35b3c8a4a.js"></script>


      
      <script src="script.js"></script>
      <script src="freewall.js"></script>
      <script src="jquery.countdown.js"></script>
      <script src="node_modules/socket.io-client/socket.io.js"></script>
      <script src="sweetalert.min.js"></script>
      <style type="text/css">
    #container {
      width: 80%;
      margin: auto;
    }
    .item {
      background: rgb(103,112,119);
      width: 300px;
      height: 300px;
    }
    body{
    background-color: #252839;
    color: #000;
  }
          
   

  </style>
      <script>

      </script>
<style src="button.css"></style>
      
      
  </head>
  <body bgcolor="#e68a00"> 
      
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Skinbasar</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="home.php">Home</a></li>
            <li class="active"><a href="past.php">Past Auctions</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
        <?php
    if(!isset($_SESSION['steamid'])) {
        
        //echo "<li><a href='#'><span></span></a></li></li>";
        echo "<li><a href='?login' style='padding-top:0px;padding-bottom:0px;line-height:50px'>Login</a></li></li>";
        //loginbutton("small");
	}  else {
        include ('steamauth/userInfo.php');
        echo "<li class='dropdown' id='steam' title='".$steamprofile['avatarmedium']."' name='".$steamprofile['steamid']."'><a href='#'class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false' style='padding-top:0px;padding-bottom:0px;line-height:50px'><img src='".$steamprofile['avatar'].">'><span class='caret'></span></a><ul id='profilenav' class='dropdown-menu'><li><a href='?logout'>Logout</a></li></ul></li>";
define('DB_HOST', 'eu-cdbr-west-01.cleardb.com');
define('DB_NAME', 'heroku_1ed81913353afff');
define('DB_USER','b16f3dd482fc76');
define('DB_PASSWORD','d96171c8');

        $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " .     mysqli_error());
        $db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());


        $sql="SELECT * FROM users WHERE steamid=".$steamprofile['steamid'];

        $result = mysqli_query($con,$sql); //$result is an array

        $num_rows=mysqli_num_rows($result);
        $coins="10000";
        
        if($num_rows>0){
            while($row = mysqli_fetch_array($result))
            {
                echo "<li><button type='button' class='btn btn-link navbar-btn'><i class='fa fa-diamond' aria-hidden='true'> ".$row['coins']."</i></button></li>";

  }

        }else{
            $sql="INSERT INTO `users`(`steamname`, `steamid`, `avatar`,`coins`) VALUES ('".$steamprofile['personaname']."','".$steamprofile['steamid']."','".$steamprofile['avatarmedium']."','10000')";
            //echo $sql;
            echo "<p id='coins' class='navbar-text'><i class='fa fa-diamond' aria-hidden='true'>0</i></p>";
            $result=mysqli_query($sql);
            if($result)
	{
	    //echo "Successfully updated database";
	}
	else
	{
	 //die('Error: '.mysql_error($con));
	}

        }

        

        

        mysqli_close($con);
    
    }
            ?>
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>      
      



      
      <br>
      <br>
      
      <br>
    
      <div id="box" style="width:auto;height:auto;border:1px solid #000;background-color: #fff; text-align: left;">
      <table id="datatable" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Weapon</th>
                <th>Skin</th>
                <th>Wear</th>
                <th>Price</th>
                <th>Paid</th>
                <th>Pay</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Weapon</th>
                <th>Skin</th>
                <th>Wear</th>
                <th>Price</th>
                <th>Paid</th>
                <th>Pay</th>
            </tr>
        </tfoot>
    </table>
      </div>
            <br>
      <br>
      <br>    

    <script type="text/javascript"> 
        
        var dtable=$('#datatable').DataTable(); 
        
        var wall=new Freewall("#container");
        wall.reset({
				selector: '.cell',
				animate: true,
				cellW: 100,
				cellH: 100,
				onResize: function() {
					wall.refresh();
				}
			});
			wall.fitWidth();
			// for scroll bar appear;
			$(window).trigger("resize");
        $(document).ready(function(){
            
            
            $.ajax({
            url: 'getprofile.php',
            type:'GET',
            dataType: 'json',
            success: function(output_string){
                console.log(output_string);
                for( var i=0;i<output_string.length;i++){
                    var status_paid="";
                    var btn="<input class='ph-button ph-btn-green' id='"+output_string[i].Itemid+"' type='button' value='Pay'>"
                    if(output_string[i].Name==1){
                        status_paid="<i class='fa fa-check fa-1'></i>";
                    }else{
                         status_paid="<i class='fa fa-times fa-1'></i>";
                    }
                    
                 dtable.row.add([
                     output_string[i].Weapon,
                     output_string[i].Skin,
                     output_string[i].Wear,
                     output_string[i].Price,
                    status_paid,
                    btn]).draw();
                }
       
                },
                    error: function (xhr, ajaxOptions, thrownError){
                    console.log(xhr.statusText);
                    console.log(thrownError);
  
                    }
    }); 
            
           
   
        });
        
        
    </script>
      
	


  </body>
</html>
