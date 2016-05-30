<!DOCTYPE html>
<html>
<head>
  <title> freewall demo getting started</title>
  <script src="jquery-2.2.3.min.js"></script>
  <script src="freewall.js"></script>
    <script src="jquery.countdown.js"></script>
 <link rel="stylesheet" href="item_design.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optionales Theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://use.fontawesome.com/e35b3c8a4a.js"></script>
</head>
<body>
  <div id="container">

  </div>
  <script>
    var wall=new Freewall("#container");
        wall.reset({
				selector: '.cell',
				animate: true,
				cellW: 500,
				cellH: 150,
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
                        var str='<div class="item"><div class="auction-info"><img src="https://steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot621FAR17PLfYQJD_9W7m5a0mvLwOq7cqWdQ-sJ0xOzAot-jiQa3-hBqYzvzLdSVJlQ3NQvR-FfsxL3qh5e7vM6bzSA26Sg8pSGKJUPeNtY/360fx360f" style="float:right;" width="45%"></img><h3 class="greyTextColor" style="background:linear-gradient(90deg,#263238,transparent)">'+output_string[index].itemname+'</h3><h5 class="orangeTextColor" style="background:linear-gradient(90deg,#263238,transparent)">'+output_string[index].kondition+'</h5><h5 class="orangeTextColor"> '+output_string[index].steamprice+'</h5><div id="owner'+x+'"><h5 class="orangeTextColor" style="text-align:center;">'+owner+'</h5></div><img src="'+ava+'" align="middle" style="padding-left:106px;"></img></div><div class="auction-action"><button type="button" class="btn btn-default pull-right btn-sm" style="margin-right:10px;"><i class="fa fa-diamond" aria-hidden="true" style="margin-right:5px;padding-right:5px;border-right-style:solid;border-width:thin;">'+output_string[index].price+'</i>Bid</button><div id="time'+x+' style="float:left;"><h5 class="orangeTextColor" style="padding-top:7px;margin-bottom:0px;">'+output_string[index].endtime+'</h5></div><div id="price'+x+'" style="display:inline-block;"><h3 style="margin-left:5px;padding-bottom:10px;">'+output_string[index].currentprice+'</h3></div></div></div>';
                        x++;
                        wall.appendBlock(str);
    }); 
            }});
        });
            
    
  </script>
</body>
</html>
