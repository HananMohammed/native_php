$(document).ready(function(){
    $(".bracket1,.bracket2").on("mouseover" ,function(){
      $(this).css( {width:"100px" , height:"100px" , opacity : "0.8"})
    });
    $(".bracket1,.bracket2").on("mouseleave" ,function(){
      $(this).css( {width:"80px" , height:"80px" , opacity : "1"})
    });
    
  $(".bracket1").on("click",function(){
    $("#slide").fadeOut(1000).fadeIn(700);
  })
  $(".bracket2").on("click",function(){
    $("#slide").fadeOut(1000).fadeIn(700);
  });
  /*********************************************/


  $("#drop").on("click" , function(){
   
    $("#head").css({height : "250px"});
    $("#header").fadeToggle(2000);
}) ;
/******************************* */
$('#radio1').on("click",function(){

  $('.voda').fadeToggle(1500);
});
/******************************* */
$('#radio2').on("click",function(){

  $('.data').slideToggle(1500);

});
$('#radio2').on("click",function(){

  $('#card_img').slideToggle(1500);
});
$('#card_img').animate({width:'43%', height:'200px'},2000);

$('#radio3').on("click",function(){

  $('.pay').slideToggle(1500);
});
$('#check1').on('click',function(){
  $('#check1').css({color:"orange"});
});
$('#check2').on('click',function(){
  $('#check2').css({color:"orange"});
});
$('#check3').on('click',function(){
  $('#check3').css({color:"orange"});
});
$('#check4').on('click',function(){
  $('#check4').css({color:"orange"});
});
$('#check5').on('click',function(){
  $('#check5').css({color:"orange"});
});
  });