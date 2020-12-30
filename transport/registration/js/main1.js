$(document).ready(function(){
	$("body").delegate(".bussearch","click",function(){
           $("#search").hide();
           $("#result").show();
           var from=$("#from").val();
           var to=$("#to").val();
           var date=$("#date").val();
         $.ajax({
         url : "../action.php",
         method :"POST",
         data:{search:1,from:from,to:to,date:date},
         success : function(data){
           $("#results").html(data);
          
         }
      })
    })
 
    $("body").delegate(".book","click",function(){
           $("#search").hide();
           $("#result").hide();
           $("#booking").show();
            var bid=$(this).attr('bid');
            var jid=$(this).attr('jid');
            var seat=$(this).attr('seat');
         $.ajax({
         url : "../action.php",
         method :"POST",
         data:{book:1,bid:bid,jid:jid,seat:seat},
         success : function(data){
           $("#bookingres").html(data);
         }
      })
    })
   $("body").delegate(".booking","click",function(){
           $("#search").hide();
           $("#result").hide();
           $("#booking").show();
            var name=$("#name").val();
            var no_p=$("#no").val();
            var bid=$(this).attr('bid');
            var jid=$(this).attr('jid');
            var seat=$(this).attr('seat');
         $.ajax({
         url : "../action.php",
         method :"POST",
         data:{booking:1,bid:bid,jid:jid,seat:seat,name:name,no_p:no_p},
         success : function(data){
           alert(data)
         }
      })
    })
});