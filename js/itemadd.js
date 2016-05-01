$(document).ready(function(){
	
	$('#button1').click(function(e){
        var i=0;
        content1=markers[0].position.lat()+"\n"+markers[0].position.lng()+"\n"+inputs[0].value
        for(i=1;i<count;i++){
            content1=content1+"\n"+markers[i].position.lat()+"\n"+markers[i].position.lng()+"\n"+inputs[i].value
        }

		$.generateFile({
			filename	: filename1,
			content 	:  count+ "\n"+content1 ,
			script		: 'http://localhost:8080/createFile.php'
		});
		
		e.preventDefault();
	});
	
	$('#downloadPage').click(function(e){

		$.generateFile({
			filename	: 'page.html',
			content		: $('html').html(),
			script		: 'download.php'
		});
		
		e.preventDefault();
	});
	
});




