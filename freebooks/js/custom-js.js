
$(window).scroll(function() {

if ($(window).scrollTop()==0) {
	 	//$("#eee").animate({height:'0px'},3000);
        $("#anything").show(300);       
    }
	 else if ($(window).scrollTop()> 110){
	 	//$("#eee").animate({height:'0px'},3000);
        $("#anything").hide(300);    
                      
    }
    
    });
             
/*
             $(window).scroll(function () {
                 if ($(window).scrollTop() == 0) {
                     $("#eee").animate({height:'0px'},3000);
                     alert('Scrolled to Page Bottom');
                 }
                 else if ($(window).scrollTop() > 30) {
                     $("#eee").animate({height:'130px'},3000);

                     
                     //alert('Scrolled to Page Bottom');
                 }
             });
  */
 $("#home-link").mouseover(function() {
    $("#home-link").animate({paddingBottom: '15px'},200);
    $("#home-link").css('border-bottom-color','#7f9b61');
 });
  $("#home-link").mouseout(function() {
    $("#home-link").animate({paddingBottom: '10px'},100);
    $("#home-link").css('border-bottom-color','white');
 });


$("#services-link").mouseover(function() {
    var rr = $("#services-link").offset();
    $(".services-content").show(300);
    $(".services-content").css({'top': rr.top+20+'px','left': rr.left + 'px'});
    //alert(rr.top+" "+rr.left);
});

$(".services-content").mouseout(function() {
    $(".services-content").hide();
});


