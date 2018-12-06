$(document).ready(function() {
  var stt=0;
 
  $("img.slide").each(function() {
   if($(this).is(':visible')){
    stt = $(this).attr("stt");
   }
  });
  $("#next").click(function() {
    next=++stt;
   if(next==4){
    stt =-1;}
   $("img.slide").hide();
   $("img.slide").eq(stt).show();
  });
 
 
  $("#prev").click(function() {
    prev=--stt;
   if(prev ==-1){
    stt =4;}
   $("img.slide").hide();
   $("img.slide").eq(stt).show();
  });
  setInterval(function(){
    $("#next").click();
 },2000);
 });

