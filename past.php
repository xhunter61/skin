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
      background: linear-gradient(141deg, #263238, #607d8b) fixed;
      width: 300px;
      height: 300px;

    }
    .item:hover{
     border-color: #00838F;  
     border-style: solid;
     border-width: thin;
    }
    body{
    background-color: #263238;
    background: linear-gradient(141deg, #263238, #607d8b) fixed;
        color: #000;
  }
          
.navbar-default {
    background: #263238; 
    border-color: #546e7a;
}
.navbar-default .navbar-nav > li > a {
    color: #777777;
}
.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
    background-color: #263238;
    color: #555555;
}
          
   

  </style>
      <script>

      </script>
<style src="button.css"></style>
      
      
  </head>
  <body bgcolor="#e68a00"> 
      
<nav class="navbar navbar-default navbar-fixed-top">
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
    
      
      <div id="container" class="free-wall">
      </div>

            <br>
      <br>
      <br>    

    <script type="text/javascript">  
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
            url: 'getpast.php',
            type:'GET',
            dataType: 'json',
            success: function(output_string){
                    //console.log(output_string);
                var x=0;
                    $.each(output_string, function(index){
                        var ava="";
                        var owner="";
                        if(output_string[index].avatar==null){
                         ava="default.jpg";   
                        }else{
                         ava=output_string[index].avatar;
                        }
                        
                        if(output_string[index].steamname==null){
                         owner="No Bidder";   
                        }else{
                         owner=output_string[index].steamname   
                        }
                        var str='<div align="center" class="item"><h3>'+output_string[index].itemname+'</h3><h4>'+output_string[index].kondition+'</h4>'+output_string[index].price+'<br>'+output_string[index].steamprice+'<br><div id="time'+x+'">'+output_string[index].endtime+'</div><div id="price'+x+'">'+output_string[index].currentprice+'</div><div id="owner'+x+'">'+owner+'</div><img src="'+ava+'"></img><br></div>';
                       // $('#item').append(str);
                        //$('.owl-carousel').trigger('add.owl.carousel',[str,index]).trigger('refresh.owl.carousel');
                        
                        //console.log(output_string[index].itemid);
                        var tmer='#time'+x;
                        
                        x++;
                        wall.appendBlock(str);
                        $(tmer).countdown(output_string[index].endtime, function(event){
                            $(this).html(event.strftime('%H:%M:%S'));
                        });
                        
                        //setInterval(function(){getTime(output_string[index].itemid,tmer);}, 1000);
                    });
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
