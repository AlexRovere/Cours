$(function(){


$("h1, h2, h3").hover(
				function(){$(this).css("background-color", "lightBlue");},
				function(){$(this).css("background-color", "#35a637");}	
				);



$("p").hover(
				function(){$(this).css("background-color", "lightBlue");},
				function(){$(this).css("background-color", "#35a637");}	
				);
						
			})	

/*$(document).ready(function() {
    $('p').mouseenter(function() {
        $('p').css("font-size", function() {
            return parseInt($(this).css('font-size')) + 10 + 'px';
        });
    });
});

$(document).ready(function() {
    $('p').mouseleave(function() {
        $('p').css("font-size", function() {
            return parseInt ($(this).css("font-size")) - 10 + 'px';
        });
    });
});*/


$(function() {
    var state = true;
    $( "#nav_ul" ).hover(function() {
      if ( state ) {
        $( "#nav_ul" ).animate({
          backgroundColor: "green",
          color: "black",
          width: 1522
        }, 100 );
      } else {
        $( "#nav_ul" ).animate({
          backgroundColor: "maroon",
          color: "black",
          width: 1800
        }, 100 );
      }
      state = !state;
    });
  } );

  $( function() {
    $( "#accordion" ).accordion();
  } ); 