


$(document).ready(function(){
    
    $('body').bind('touchstart', function() {});
    
//Load ranodm flag image
    
    
var images = ['England.png','Sweden.png','Germany.png','Australia.png','Malta.png','Sweden.png','Ireland.png','Poland.png','Belgium.png','Ukraine.png','Denmark.png','Estonia.png','Georgia.png','Italy.png','Iceland.png','Norway.png'];
    
    $(".ko-data a").each(function(){
        
        $(this).after($('<span />',{
            class:'flag',
        }));
        
        // "flag" class already styled in main.css file
        $(".flag").each(function(){
           $(this).css({'background-image' : 'url(/img/flags/' + images[Math.floor(Math.random() * images.length)] + ')'}); 
            
        });
        
       
    });
  
    
//Load ranodm flag image    
    
    var profiles = ['128.jpg','129.jpg','130.jpg','131.jpg','132.jpg','133.jpg'];
 
    $(".ko-data.semi-finals a  , .ko-data.finals a ").each(function(){
        
        $(this).before($('<span />',{
            class:'ko-profile img-thumb',
        }));
        
        // "ko-profile" class already styled in main.css file
  
        
       
    });
    
          $(".ko-profile").each(function(){
           $(this).append('<img id="profileImage" src="/img/players/' + profiles[Math.floor(Math.random() * profiles.length)] + ' " />');
            
        });
    
    
    
    
    
     var marker = $(".markers .marker");
    var tip = $(".court-tip");
    var navbar = $(".navbar");
    var navbarHeader = $(".navbar-header");
    var loginPanel = $(".login-panel");
    var readMore = $(".description a");
   
    tip.hide();
    
    
    
    readMore.click(function(){
        var descBody =  $(this).parent().find(".description-body");
       descBody.toggleClass("short");
        
        
    });
    
    
    if (Modernizr.mq('(max-width: 768px)') & loginPanel.hasClass("loggedin") ) {
        navbar.addClass("loggedin")
        navbarHeader.addClass("loggedin")
    
} else {
    
}
       
    $(".login-btn").click(function(e3){
        e3.preventDefault();
    })
    

    
   
    
    
    function showMarker(e){
        
          var pos = $(this).position();

            tip.css({"left": pos.left  + -23 +  "px", "top": pos.top + -170 + "px"})
             tip.show();
            
            $("body").click(function(e2){
            
            if(e!=e2){
                
                tip.hide();
            };
            
        });
        
      e.preventDefault();
    }
    
    
    
    
    
    
    marker.each(function(){
        $(this).hover(showMarker);
        $(this).on('touchstart', showMarker);
        
          
    });
    
    
    
    
});
