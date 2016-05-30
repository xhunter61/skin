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
      background: rgb(103,112,119);
      width: 300px;
      height: 300px;
    }
    body{
    background-color: #263238;
    color: #000;
  }
          
.navbar-default {
    background: #263238; 
    border-color: #E7E7E7;
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
          //change background color in css 
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
            <li class="active"><a href="home.php">Home</a></li>
            <li><a href="past.php">Past Auctions</a></li>
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
<<<<<<< HEAD
define('DB_HOST', 'localhost');
define('DB_NAME', 'itemlist');
define('DB_USER','root');
define('DB_PASSWORD','');

=======
define('DB_HOST', 'eu-cdbr-west-01.cleardb.com');
define('DB_NAME', 'heroku_1ed81913353afff');
define('DB_USER','b16f3dd482fc76');
define('DB_PASSWORD','d96171c8');
>>>>>>> 509843eebb57708efd3ca8428b894a6f9545284a


        $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " .     mysql_error());
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
            $result=mysqli_query($con,$sql);
            if($result)
	{
	    //echo "Successfully updated database";
	}
	else
	{
	 //die('Error: '.mysql_error($con));
	}

        }
        //echo session_id();
        $sql="UPDATE users SET phpsessid='".session_id()."' WHERE steamid=".$steamprofile['steamid'];
        //echo $sql;
        $result=mysqli_query($con,$sql);
        //echo $result;
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
        console.log(getCookie("PHPSESSID"));
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
            url: 'itemshow.php',
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
                        var str='<div align="center" class="item"><h3>'+output_string[index].itemname+'</h3><h4>'+output_string[index].kondition+'</h4>'+output_string[index].price+'<br>'+output_string[index].steamprice+'<br><div id="time'+x+'">'+output_string[index].endtime+'</div><div id="price'+x+'">'+output_string[index].currentprice+'</div><div id="owner'+x+'">'+owner+'</div><img src="'+ava+'"></img><br><input class="ph-button ph-btn-red" id="'+output_string[index].itemid+'" type="button" value="Bid"></div>';
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
            
<<<<<<< HEAD
            var socket = io.connect("localhost:3000"); //change to localhost:3000
=======
            var socket = io.connect("https://mighty-headland-94503.herokuapp.com/"); //change to localhost:3000
>>>>>>> 509843eebb57708efd3ca8428b894a6f9545284a
          $(document).on("click",".ph-button.ph-btn-red",function(){
              var id= this.id;
             console.log("CLICK "+id); 
              var timerid= document.getElementById(id).previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.getAttribute("id");
              console.log(timerid);
              //var priceid=document.getElementById(id)
              var avatarlink=document.getElementById("steam").getAttribute("title"); 
              var steamid=document.getElementById("steam").getAttribute("name"); 
           socket.emit('status added',{itemid:id, tmerid:timerid, steamid: steamid, avatar: avatarlink, auth: getCookie("PHPSESSID")});
          });
          socket.on('refresh time',function(msg){
            //console.log(msg);
              $("#"+msg.tmerid).countdown(msg.newendtime);
              var fixedprice=parseFloat(msg.currentprice).toFixed(2);
              document.getElementById(msg.tmerid).nextSibling.innerHTML=fixedprice;
              document.getElementById(msg.tmerid).nextSibling.nextSibling.innerHTML=msg.steamname;
              document.getElementById(msg.tmerid).nextSibling.nextSibling.nextSibling.setAttribute("src", msg.currentownderavatar);
            
            if(msg.success==false){
                console.log("Item expired");
                swal("Time up", "The item has been sold!", "error");
            }else if(msg.success==true && msg.currentownerid==document.getElementById("steam").getAttribute("name")){
             swal("Success", "Your bid has been accepted", "success");   
            }
              
          });
          socket.on('auth fail',function(msg){  
             swal("Authentication Fail", "It appears you are not using the real steam id", "error"); 
          });
            
        });
        
   // "<ul><li class='last'><a href='#'>".logoutbutton()."</a></li></ul"
        
        function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}
        
    </script>
      
	


  </body>
</html>
