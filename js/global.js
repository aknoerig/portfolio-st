$(document).ready(function() {

$("#naviContainer, #content").delay(300).animate({'opacity' : '1'},500);
$(".books_timeout").hide();
$('.toggleSub').delay(1500).animate({'height' : '0', 'opacity' : '0'},600);
$('.toggleContent').delay(1500).animate({'top' : '115px'},600);
$('.setContent').css({'top' : '115px'},0);
$('#info').animate({'opacity' : '0'},0);
/*$("#sign_d").animate({'opacity' : '0'},0).delay(500).animate({'opacity' : '1'},300);*/
$("#switcher_l").animate({'opacity' : '0'},0).delay(500).animate({'opacity' : '1'},300);
$("#footer_l").animate({'opacity' : '0'},0).delay(500).animate({'opacity' : '1'},300);
$("#switcher_d").hide().animate({'opacity' : '0'},0);
$("#footer_d").hide();
$("#intro:nth-child(1)").addClass("outer").animate({'opacity' : '0'});
$("#intro:nth-child(2)").addClass("middle").animate({'opacity' : '0'});
$("#intro:nth-child(3)").addClass("inner").animate({'opacity' : '0'});
$("#subNavLtr #all").addClass("active_ltr");
$("#tear p a").attr("target","_blank");

// overwrite Packery methods
var PackeryMode = Isotope.LayoutMode.modes.packery;
var __resetLayout = PackeryMode.prototype._resetLayout;
PackeryMode.prototype._resetLayout = function() {
  __resetLayout.call( this );
  // reset packer
  var parentSize = getSize( this.element.parentNode );
  var colW = this.columnWidth + this.gutter;
  this.fitWidth = Math.floor( ( parentSize.innerWidth + this.gutter ) / colW ) * colW;
  this.packer.width = this.fitWidth;
  this.packer.height = Number.POSITIVE_INFINITY;
  this.packer.reset();
};

PackeryMode.prototype._getContainerSize = function() {
  // remove empty space from fit width
  var emptyWidth = 0;
  for ( var i=0, len = this.packer.spaces.length; i < len; i++ ) {
    var space = this.packer.spaces[i];
    if ( space.y === 0 && space.height === Number.POSITIVE_INFINITY ) {
      emptyWidth += space.width;
    }
  }

  return {
    width: this.fitWidth - this.gutter,
    height: this.maxY - this.gutter
  };
};

// always resize
PackeryMode.prototype.needsResizeLayout = function() {
  return true;
};

// init Isotope
var $listgrid = $('.listgrid').isotope({
  itemSelector: '.listgrid-item',
  layoutMode: 'packery',
  percentPosition: true,
  packery: {
    columnWidth: '.listgrid-sizer'
    //gutter: 10
  }
});
// layout Isotope after each image loads
$listgrid.imagesLoaded().progress( function() {
  $listgrid.isotope('layout');
});



/*
$(function() {
            var $nav = $('#naviContainer ul');

            var setNavScale = function() {
                var scaleSource = $nav.width(),
                    scaleFactor = 0.1,
                    maxScale = 92,
                    minScale = 80;

                var fontSize = scaleSource * scaleFactor;

                if (fontSize > maxScale) fontSize = maxScale;
                if (fontSize < minScale) fontSize = minScale;

                $('#naviContainer ul li a').css('font-size', fontSize + '%');
            }

            $(window).resize(function(){
                setNavScale();
            });

            setNavScale();
        });
*/

$('#ltr_btn_container').on('click', 'input', function() {
	var selection = [];
    $('#ltb #container').filter(function() {
        return $(this).find('.clicked').css('display') == 'block';
    }).each(function() {
    	var src = $(this).find("img").attr('src');
    	src = src.replace("/cms/images/ltr_thumbs_sml/Sabrina_Theissen_", "_");
    	src = src.replace(".jpg", ".");
    	$(this).find("img").attr("src", src);
       	selection.push($(this).find("img").attr("src"));

   });

		window.location.replace("&selection="+selection);

    $('#ltb #container').filter(function() {
        return $(this).find('.clicked').css('display') == 'block';
    }).each(function() {
    	var src = $(this).find("img").attr('src');
    	src = src.replace("_", "/cms/images/ltr_thumbs_sml/Sabrina_Theissen_");
    	src = src.replace(".", ".jpg");
    	$(this).find("img").attr("src", src);
	});
});


$(function(){

		var $cutsArray = $('#tear p');

	  $cutsArray.each(function(){

        var $this = $(this);

        if ($this.height() <= 25) {
            $this.css({'text-align' : 'center'});
            return true;
        	}	else {
			$this.css({'text-align' : 'justify'});
            return true;
			}
      });
});


$(function() {
		$("li a").click(function() {
				var page = this.hash.substr(1);
				$.get("/sites/"+page+".php", function(getContent) {
						$("#info").html(getContent);
						$("#info").show().delay(100).animate({'opacity' : '1.0'},300);
 						$("#overview").css({'position' : 'fixed'});
				});

				 		$("li a").removeClass("active");
				 		$(this).addClass("active");

		});

				if (location.hash) {
					$("a[href="+location.hash+"]").click();
				}
});


$(document).on('click', "#ltb #container .add", function() {
    	$(this).hide();
    	$(this).addClass("count");
			$(this).parent("#container").children("img").animate({'opacity' : '1','width' : '160px'},300);
			$("#ltb #container img").delay(500).animate({'opacity' : '1'},300);
			$(this).parent("#container").animate({'width' : '160px'},300);
    	$(this).parent("#container").children(".reset").hide();
    	$(this).parent("#container").children(".add").fadeOut(50);
    	$(this).parent("#container").children(".clear").fadeOut(50);
  		var src = $(this).parent("#container").children("img").attr('src');
  		src = src.replace("ltr_thumbs/", "ltr_thumbs_sml/");
  		$(this).parent("#container").children("img").attr("src", src);
  		$(this).parent("#container").children(".clicked").delay(800).fadeToggle(50);
			$('#counter span').empty();
			var countSelected = $(".count").length;
			$('#counter span').append(countSelected);
});

/*

$(document).on('click', "#ltb #container .clear", function() {
    $(this).parent("#container").children(".clicked").fadeToggle(50);
    $(this).parent("#container").children(".add").fadeToggle(1);
    $(this).fadeToggle(1);
});
*/

$("#ltb #container .clicked").click(function() {
    $(this).fadeToggle(50);
		$(this).parent("#container").children("p").removeClass("count");
		$('#counter span').empty();
		var countSelected = $(".count").length;
  	$('#counter span').append(countSelected);
});

$("#ltb #container img").click(
		function(){
    		var src = $(this).attr('src');
    		src = src.replace("ltr_thumbs_sml/", "ltr_thumbs/");
    		$(this).attr("src", src);
				$("#ltb #container img").animate({'opacity' : '0.25'},200);
				$(this).animate({'width' : '528px'},300);
				$(this).animate({'opacity' : '1'},200);
				$(this).parent("#container").delay(100).animate({'width' : '528px'},200);
				$('html, body').delay(500).animate({scrollTop: $(this).offset().top - 75}, 300);
      	$(this).parent("#container").children(".add").delay(800).fadeIn(100);
      	$(this).parent("#container").children(".reset").show();
		}
);

$(".reset").click(
		function(){
	       	$(this).parent("#container").children(".add").fadeOut(300);
					$(this).parent("#container").children("img").animate({'opacity' : '1','width' : '160px'},300);
					$("#ltb #container img").delay(500).animate({'opacity' : '1'},300);
					$(this).parent("#container").animate({'width' : '160px'},300);
        	$(this).hide();
        	$(this).parent("#container").children(".add").fadeOut(50);
        	$(this).parent("#container").children(".clear").fadeOut(50);
	    		var src = $(this).parent("#container").children("img").attr('src');
	    		src = src.replace("ltr_thumbs/", "ltr_thumbs_sml/");
	    		$(this).parent("#container").children("img").attr("src", src);
		}
);

$(".unwhite").click(
		function(){
			$(".white-points").removeClass("white-points");
			$("#sign").show();
			/*$("#sign_d").hide();*/
		}
);

$(".light-switch").click(
		function(){
			$(".white-points").removeClass("white-points");
			$("#sign").show();
			/*$("#sign_d").hide();*/
			$("#footer_l").hide();
			$("#switcher_l").hide();
			$("#ltb #container p.add").css({'right' : '-4px'});
			$("#switcher_d").show().delay(600).animate({'opacity' : '1'},100);
			$("#footer_d").show();
			$("#counter p").addClass("switch_d");
			$("html, body").css({ "background-color" : "#f5f5f5", "-webkit-transition" : "0.6s linear", "-moz-transition" : "0.6s linear", "-o-transition" : "0.6s linear", "transition" : "0.6s linear" },0);

		}
);

$("a[href='#top']").click(
		function(){
      $('html, body').animate({scrollTop:0}, 500);
      return false;
		}
);


$(".switch-back").click(
		function(){
			$("#naviContainer ul li").addClass("white-points");
			$("#sign").hide();
			/*$("#sign_d").animate({'opacity' : '0'},0).show().delay(500).animate({'opacity' : '1'},150);*/
			$("#footer_l").animate({'opacity' : '0'},0).show().delay(500).animate({'opacity' : '1'},150);
			$("#switcher_l").show().delay(600).animate({'opacity' : '1'},100);
			$("#switcher_d").hide();
			$("#footer_d").hide();
			$("#ltb #container p.add").css({'right' : '-5px'});
			$("#counter p").removeClass("switch_d");
			$("html, body").css({ "background-color" : "#1a1b20", "-webkit-transition" : "0.6s linear", "-moz-transition" : "0.6s linear", "-o-transition" : "0.6s linear", "transition" : "0.6s linear" },0);

		}
);

/*
$('#content #overview #project').hover(
		function(){
			$(this).children("a").animate({'opacity' : '0'},200);
			$(this).children("h2").css({'visibility' : 'visible'});
			$(this).children("h3").css({'visibility' : 'visible'});
		},
		function(){
			$(this).children("a").animate({'opacity' : '1'},200);
			$(this).children("h2").css({'visibility' : 'hidden'});
			$(this).children("h3").css({'visibility' : 'hidden'});
		}
);
*/

$("#welcome").delay(1000).animate({'opacity' : '1'},300).delay(1000).animate({'opacity' : '0'}, 500).delay(100).animate({'top' : '-2000px'}, 500);
$(".inner").delay(800).animate({'opacity' : '1'},300).delay(1500).animate({'marginTop' : '-2000px'}, 1500);
$(".middle").delay(800).animate({'opacity' : '1'},300).delay(1500).animate({'marginTop' : '-2000px'}, 1500);
$(".outer").delay(800).animate({'opacity' : '1'},300).delay(1500).animate({'marginTop' : '-2000px'}, 1500);
$(".hider").delay(3700).animate({'opacity' : '0'},0).delay(1000).show(0).animate({'opacity' : '1'},500);
$(".hiderOverview").delay(3000).animate({'marginTop' : '1200px', 'opacity' : '0'},0).delay(300).show(0).animate({'marginTop' : '0','opacity' : '1'},500);


/*
var expandTimer;
var collapsSub;

$(".ltr_expand").hover(
		function(){
		var t = setTimeout(function() {
		$('#ltb').animate({'marginTop' : '405'},300);
		$('#subNavLtr').delay(300).animate({'opacity' : '1'},100).fadeIn();
		}, 300);
   			 $(this).data('timeout', t);
		},
		function(){
		clearTimeout($(this).data('timeout'));
		$('#ltb').delay(2000).animate({'marginTop' : '100px'},400);
		$('#subNavLtr').delay(1700).animate({'opacity' : '0'},300).fadeOut();
		}
);

*/

$(".ltr_expand").click(
		function(){
		$('#ltb').animate({'marginTop' : '415px'},300);
		$('#subNavLtr').delay(200).animate({'opacity' : '1'},100).fadeIn();
		}
);

$("#subNavLtr").mouseleave(
		function(){
		$('#ltb').delay(500).animate({'marginTop' : '100px'},400);
		$('#subNavLtr').delay(300).animate({'opacity' : '0'},300).fadeOut();
		}
);

$("#subNavLtr p").click(
		function(){
		$('#ltb').delay(500).animate({'marginTop' : '100px'},400);
		$('#subNavLtr').delay(300).animate({'opacity' : '0'},300).fadeOut();
		}
);

$("#subNavLtr #all").click(
		function(){
			$("#subNavLtr p").removeClass("active_ltr");
			$("#ltb #container").fadeIn(400);
			$(this).addClass("active_ltr");
			$('.crump').empty();
			$('.crump').append('(All)');
		}
);


$("#subNavLtr #women").click(
		function(){
			$("#subNavLtr p").removeClass("active_ltr");
			$("#ltb #container").fadeOut(300);
			$("#ltb .cat1").fadeIn(400);
			$(this).addClass("active_ltr");
			$('.crump').empty();
			$('.crump').append('(Women)');
		}
);

$("#subNavLtr #men").click(
		function(){
			$("#subNavLtr p").removeClass("active_ltr");
			$("#ltb #container").fadeOut(300);
			$("#ltb .cat2").fadeIn(400);
			$(this).addClass("active_ltr");
			$('.crump').empty();
			$('.crump').append('(Men)');
		}
);

$("#subNavLtr #couples").click(
		function(){
			$("#subNavLtr p").removeClass("active_ltr");
			$("#ltb #container").fadeOut(300);
			$("#ltb .cat5").fadeIn(400);
			$(this).addClass("active_ltr");
			$('.crump').empty();
			$('.crump').append('(Couples)');
		}
);

$("#subNavLtr #studio").click(
		function(){
			$("#subNavLtr p").removeClass("active_ltr");
			$("#ltb #container").fadeOut(300);
			$("#ltb .cat3").fadeIn(400);
			$(this).addClass("active_ltr");
			$('.crump').empty();
			$('.crump').append('(Studio)');
		}
);

$("#subNavLtr #location").click(
		function(){
			$("#subNavLtr p").removeClass("active_ltr");
			$("#ltb #container").fadeOut(300);
			$("#ltb .cat4").fadeIn(400);
			$(this).addClass("active_ltr");
			$('.crump').empty();
			$('.crump').append('(Location)');
		}
);

$("#subNavLtr #objects").click(
		function(){
			$("#subNavLtr p").removeClass("active_ltr");
			$("#ltb #container").fadeOut(300);
			$("#ltb .cat6").fadeIn(400);
			$(this).addClass("active_ltr");
			$('.crump').empty();
			$('.crump').append('(Objects)');
		}
);

/*

$(".set_timeout").click(
		function(){
			$(".books").hide();
			$(".books_timeout").show();
	});

$(".books_timeout a").hover(
		function(){
		var t = setTimeout(function() {
		$('#overview').animate({'marginTop' : '135'},300);
		$('#subNavLtr').animate({'opacity' : '1'},100).fadeIn();
		}, 10000);
   			 $(this).data('timeout', t);
		},
		function(){
		clearTimeout($(this).data('timeout'));
		$('#overview').delay(2500).animate({'marginTop' : '5px'},400);
		$('#subNavLtr').delay(2400).animate({'opacity' : '0'},300).fadeOut();
		}
);

*/


/*

var $books = $(window).scroll(function() {
    if($books.scrollTop() > 0) {
         $('#mark-books').stop().animate({
                    'marginTop' : '45px'
             }, 100);
    } else {
         $('#mark-books').stop().animate({
                    'marginTop' : '175px'
             }, 100);
       }
});

var $dp = $(window).scroll(function() {
    if($dp.scrollTop() > 4000) {
         $('#mark-books').css({
                    'visibility' : 'hidden'
             });
    } else {
         $('#mark-books').css({
                    'visibility' : 'visible'
             });
       }
});
*/

/*
		var $window=$(window);
		$(window).scroll(
			function(){
				var e=$("#mark-books");
				var t=$("#list");
				var n=e.offset().top;
				var r=t.offset().top;
				var i=n+e.height();
				var s=r+t.height();
				if(i>=r&&n<s){
					function o(){
						var e=$window.width();
						if(e<1300){
							$("#mark-books").css({visibility:"hidden"})
						} else {
							$("#mark-books").css({visibility:"visible"})
						}
					}
					o();
					$(window).resize(o)
				} else {
					$("#mark-books").css({visibility:"visible"})
				}
			}
		)
*/

var $topper = $(window).scroll(function() {
    if($topper.scrollTop() > 1600) {
      	$('#topper a').stop().css({'display' : 'inline-block'});
    } else {
     		$('#topper a').stop().css({'display' : 'none'});
   	}
});

var $topper_ltr = $(window).scroll(function() {
    if($topper_ltr.scrollTop() > 1200) {
         $('#topper_ltr a p').stop().css({'display' : 'inline-block'});
    } else {
         $('#topper_ltr a p').stop().css({'display' : 'none'});
    }
});

/*
$('#list').each(function(){

				if($(this).children().length <= 1) {

							$(".book-item:nth-child(1)").css({'marginTop' : '32px'},0);

				}	else {

							$(".book-item:nth-child(1)").css({'marginTop' : '-35px'},0);

					}

				if($(this).children().length <= 4) {

							$(".book-item:nth-child(4)").css({'marginTop' : '-67px'},0);

				}	else {

							$(".book-item:nth-child(4)").css({'marginTop' : '-135px'},0);

					}

				if($(this).children().length <= 7) {

							$(".book-item:nth-child(7)").css({'marginTop' : '-67px'},0);

				}	else {

							$(".book-item:nth-child(7)").css({'marginTop' : '-135px'},0);

					}

				if($(this).children().length <= 10) {

							$(".book-item:nth-child(10)").css({'marginTop' : '-67px'},0);

				}	else {

							$(".book-item:nth-child(10)").css({'marginTop' : '-135px'},0);

					}

				if($(this).children().length <= 13) {

							$(".book-item:nth-child(13)").css({'marginTop' : '-67px'},0);

				}	else {

							$(".book-item:nth-child(13)").css({'marginTop' : '-135px'},0);

					}

				if($(this).children().length <= 16) {

							$(".book-item:nth-child(16)").css({'marginTop' : '-67px'},0);

				}	else {

							$(".book-item:nth-child(16)").css({'marginTop' : '-135px'},0);

					}

				if($(this).children().length <= 19) {

							$(".book-item:nth-child(19)").css({'marginTop' : '-67px'},0);

				}	else {

							$(".book-item:nth-child(19)").css({'marginTop' : '-135px'},0);

					}

				if($(this).children().length <= 22) {

							$(".book-item:nth-child(22)").css({'marginTop' : '-67px'},0);

				}	else {

							$(".book-item:nth-child(22)").css({'marginTop' : '-135px'},0);

					}

				if($(this).children().length <= 25) {

							$(".book-item:nth-child(25)").css({'marginTop' : '-67px'},0);

				}	else {

							$(".book-item:nth-child(25)").css({'marginTop' : '-135px'},0);

					}

				if($(this).children().length <= 28) {

							$(".book-item:nth-child(28)").css({'marginTop' : '-67px'},0);

				}	else {

							$(".book-item:nth-child(28)").css({'marginTop' : '-135px'},0);

					}

				if($(this).children().length <= 31) {

							$(".book-item:nth-child(31)").css({'marginTop' : '-67px'},0);

				}	else {

							$(".book-item:nth-child(31)").css({'marginTop' : '-135px'},0);

					}

				if($(this).children().length <= 34) {

							$(".book-item:nth-child(34)").css({'marginTop' : '-67px'},0);

				}	else {

							$(".book-item:nth-child(34)").css({'marginTop' : '-135px'},0);

					}

				if($(this).children().length <= 37) {

							$(".book-item:nth-child(37)").css({'marginTop' : '-67px'},0);

				}	else {

							$(".book-item:nth-child(37)").css({'marginTop' : '-135px'},0);

					}

				if($(this).children().length <= 40) {

							$(".book-item:nth-child(40)").css({'marginTop' : '-67px'},0);

				}	else {

							$(".book-item:nth-child(40)").css({'marginTop' : '-135px'},0);

					}
});


$(".book-item:nth-child(2)").css({'marginTop' : '100px'},0);
$(".book-item:nth-child(3)").css({'marginTop' : '-35px'},0);
$(".book-item:nth-child(6)").css({'marginTop' : '-135px'},0);
$(".book-item:nth-child(9)").css({'marginTop' : '-135px'},0);
$(".book-item:nth-child(12)").css({'marginTop' : '-135px'},0);
$(".book-item:nth-child(15)").css({'marginTop' : '-135px'},0);
$(".book-item:nth-child(18)").css({'marginTop' : '-135px'},0);
$(".book-item:nth-child(21)").css({'marginTop' : '-135px'},0);
$(".book-item:nth-child(24)").css({'marginTop' : '-135px'},0);
$(".book-item:nth-child(27)").css({'marginTop' : '-135px'},0);
$(".book-item:nth-child(30)").css({'marginTop' : '-135px'},0);
$(".book-item:nth-child(33)").css({'marginTop' : '-135px'},0);
$(".book-item:nth-child(36)").css({'marginTop' : '-135px'},0);
$(".book-item:nth-child(39)").css({'marginTop' : '-135px'},0);
$(".book-item:nth-child(42)").css({'marginTop' : '-135px'},0);

*/

});
