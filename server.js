var app       =     require("express")();
var express    =    require("express");
var mysql     =     require("mysql");
var http      =     require('http').Server(app);
var io        =     require("socket.io").listen(http);
var dateFormat= require("dateformat");

var timeresponse={itemid: "", tmerid:"", newendtime:""};

/* Creating POOL MySQL connection.*/

var pool    =    mysql.createPool({
      connectionLimit   :   100,
      host              :   'sql7.freemysqlhosting.net',
      port              :   '3306',
      user              :   'sql7119806',
      password          :   'lzmjaK2JC2',
      database          :   'sql7119806',
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
            console.log("sending refresh "+timeresponse.newendtime);
            io.emit('refresh time',timeresponse);
        } else {
            io.emit('error');
        }
      });
    });
});

var add_status = function (status,callback) {
    console.log(status.itemid+" "+status.tmerid);
    pool.getConnection(function(err,connection){
        if (err) {
          connection.release();
          callback(false);
          return;
        }
            connection.query("UPDATE itemlist SET Endtime=DATE_ADD(Endtime, INTERVAL 10 second) WHERE Endtime IS NOT NULL AND itemid="+status.itemid,function(err,rows){
            //connection.release();
            
            if(!err) {
              callback(true);
            }
        });
    connection.query("SELECT Endtime FROM itemlist WHERE Endtime IS NOT NULL AND itemid="+status.itemid,function(err,rows){
        console.log(rows[0].Endtime);
            connection.release();
            timeresponse.newendtime=dateFormat(rows[0].Endtime,"yyyy-mm-dd HH:MM:ss");
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
