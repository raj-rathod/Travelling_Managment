$(document).ready(function(){
  function ticket(){
     $.ajax({
         url : "action.php",
         method :"POST",
         data:{ticket:1},
         success : function(data){
         
           $("#results").html(data);
          
         }
      })
  }
  ticket();
    $("body").delegate(".booking","click",function(){
     $("#booked").show(); 
     $("#booking").hide();
     var bid=$("#bid").val();
       $.ajax({
         url : "action.php",
         method :"POST",
         data:{bkd:1,bid:bid},
         success : function(data){
           $("#bresult").html(data);
         }
      })
      
    })
    $("body").delegate(".ticketdate","click",function(){
     $("#bookeddate").show(); 
     $("#ticketdate").hide();
     var bid=$("#bid").val();
     var date=$("#pdate").val();
       $.ajax({
         url : "action.php",
         method :"POST",
         data:{tbkd:1,bid:bid,date:date},
         success : function(data){
         
           $("#bdresult").html(data);
         }
      })
      
    })
});