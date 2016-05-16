var app       =     require("express")();
var express    =    require("express");
var mysql     =     require("mysql");
var http      =     require('http').Server(app);
var io        =     require("socket.io").listen(http);
var dateFormat= require("dateformat");
var price=0;
var steamid="";


var timeresponse={itemid: "", tmerid:"", newendtime:"", currentprice:"", currentownerid:"", currentownderavatar:"", steamname:"", success:""};

/* Creating POOL MySQL connection.*/

var pool    =    mysql.createPool({
      connectionLimit   :   10000,
      host              :   'localhost',
      port              :   '3306',
      user              :   'root',
      password          :   '',
      database          :   'itemlist',
      datestrings       :   'DATETIME',
      debug             :   false
});



	// statische Dateien ausliefern
	app.use(express.static(__dirname));


app.get("/",function(req,res){
    res.sendFile(__dirname + '/home.html');
});


/*  This is auto initiated event when Client connects to Your Machien.  */

io.on('connection',function(socket){  
    console.log("A user is connected");
    socket.on('status added',function(status){
      add_status(status,function(res){
        if(res){
            timeresponse.itemid=status.itemid;
            timeresponse.tmerid=status.tmerid;
            console.log("sending refresh ");
            console.log(timeresponse);
            io.emit('refresh time',timeresponse);
        } else {
            io.emit('error');
        }
      });
    });
});

var add_status = function (status,callback) {
    pool.getConnection(function(err,connection){
        if (err) {
          connection.release();
          callback(false);
          return;
        }
            connection.query("UPDATE itemlist SET Endtime=DATE_ADD(Endtime, INTERVAL 10 second) WHERE Endtime IS NOT NULL AND itemid="+status.itemid,function(err,rows){
            //connection.release();
            
            if(!err) {
              //callback(true);
            }
        });
        

        
connection.query("UPDATE itemlist SET currentprice=currentprice + 0.01, currentownerid="+status.steamid+" WHERE itemid="+status.itemid+" AND Price<=(SELECT coins FROM users WHERE steamid="+status.steamid+")"
,function(err,rows){
            //connection.release();
            if(!err) {
                
              //callback(true);
            }
        });   

    connection.query("SELECT currentprice FROM itemlist WHERE itemid="+status.itemid,function(err,rows){
            //connection.release();
        //console.log(rows);
            timeresponse.currentprice=rows[0].currentprice;
            if(!err) {
              //callback(true);
            }
        });
        
        
        connection.query("UPDATE users SET coins=coins-(SELECT Price FROM itemlist WHERE itemid="+status.itemid+") WHERE steamid="+status.steamid+" AND coins>=(SELECT Price FROM itemlist WHERE itemid="+status.itemid+")",function(err,rows){
            //connection.release();
            console.log(rows.changedRows);
            
            
            
            if(!err) {
             // callback(true);
            }
        });
        
connection.query("SELECT currentownerid FROM itemlist WHERE itemid="+status.itemid,function(err,rows){
            //connection.release();
            timeresponse.currentownerid=rows[0].currentownerid;
            
            if(!err) {
              //callback(true);
            }
        });
        

 connection.query("SELECT steamname, avatar FROM users WHERE steamid=(SELECT currentownerid FROM itemlist WHERE itemid="+status.itemid+")",function(err,rows){
            //connection.release();
    //console.log(rows);
            timeresponse.steamname=rows[0].steamname;
            timeresponse.currentownderavatar=rows[0].avatar;
            
            
            if(!err) {
              //callback(true);
            }
        });       

        
        
//////////////////////////////////////////////////        
    connection.query("SELECT Endtime FROM itemlist WHERE Endtime IS NOT NULL AND itemid="+status.itemid,function(err,rows){
        //console.log(rows[0].Endtime);
            connection.release();
            timeresponse.newendtime=dateFormat(rows[0].Endtime,"yyyy-mm-dd HH:MM:ss");
        console.log(timeresponse);
            if(!err) {
              callback(true);
            }
        });
     connection.on('error', function(err) {
              callback(false);
              return;
        });
    });
}

http.listen(3000,function(){
    console.log("Listening on 3000");
});