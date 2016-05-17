function LinkerOn(){
	richTextField.document.designMode = 'On';
}

function iLink(){
	var linkURL = prompt("Add a website you want to link to.\nKeep the \"http://\" right at the beginning.\n", "http://"); 
	richTextField.document.execCommand("CreateLink", false, linkURL);
}
function iUnLink(){
	richTextField.document.execCommand("Unlink", false, null);
}

function flipText() {
	document.getElementById("cut_form").elements["cut_text"].value = window.frames['richTextField'].document.getElementsByTagName("span")[0].innerHTML;
}

function flipTextMain() {
	document.getElementById("cut_form").elements["cut_text"].value = window.frames['richTextField'].document.body.innerHTML;
}

$(function() {


	$( ".changer" ).hover(
		function(){
			
			$(this).children('div').removeClass("list_c_default");
			$(this).children('div').addClass("list_z_default");

		},
		function(){
			
			$(this).children('div').removeClass("list_z_default");
			$(this).children('div').addClass("list_c_default");
			
		}
	);

	$("#trasher img" ).animate({"opacity" : "0.5"},0);
	$("#trasher-note" ).animate({"opacity" : "0"},0);
	$(".trasher-onstate" ).hide(0).animate({"opacity" : "0"},0);

	$("#trasher img").click(function() {
		$(".trasher-onstate" ).show(0).animate({"opacity" : "1"},200);
	});

	$("#lb_img p a").click(function() {
		$(".trasher-onstate" ).show(0).animate({"opacity" : "1"},200);
	});

	$( "#trasher img" ).hover(
		function(){
			
			$(this).animate({"opacity" : "1"}, 10);
			$("#trasher-note" ).animate({"opacity" : "1"},400);

		},
		function(){
			
			$(this).animate({"opacity" : "0.5"},10);
			$("#trasher-note" ).animate({"opacity" : "0"},200);
			
		}
	);	
	
	$(".toggle_items").click(function() {
		$(this).next("#show_items").slideToggle(500);
	});
	
	$(".switch_to_news").click(function() {
		$("#news").show();
		$("#press").hide();
		$(".switch_to_news").addClass("posts-on");
		$(".switch_to_press").removeClass("posts-on");

	});

	$(".switch_to_press").click(function() {
		$("#press").show();
		$("#news").hide();
		$(".switch_to_news").removeClass("posts-on");
		$(".switch_to_press").addClass("posts-on");
	});
	
	$("#about-lang-switch p:nth-child(1)").click(function(e) {
	
		$("#about-switch-container textarea").removeClass("on");
		$("#about-lang-switch p").removeClass("on");
		$("#about-switch-container textarea:nth-child(1)").addClass("on");
		$("#about-lang-switch p:nth-child(1)").addClass("on");
		
	});
	
	$("#about-lang-switch p:nth-child(2)").click(function(e) {
	
		$("#about-switch-container textarea").removeClass("on");
		$("#about-lang-switch p").removeClass("on");
		$("#about-switch-container textarea:nth-child(2)").addClass("on");
		$("#about-lang-switch p:nth-child(2)").addClass("on");
		
	});
	
	$("#imprint-lang-switch p:nth-child(1)").click(function(e) {
	
		$("#imprint-switch-container textarea").removeClass("on");
		$("#imprint-lang-switch p").removeClass("on");
		$("#imprint-switch-container textarea:nth-child(1)").addClass("on");
		$("#imprint-lang-switch p:nth-child(1)").addClass("on");
		
	});
	
	$("#imprint-lang-switch p:nth-child(2)").click(function(e) {
	
		$("#imprint-switch-container textarea").removeClass("on");
		$("#imprint-lang-switch p").removeClass("on");
		$("#imprint-switch-container textarea:nth-child(2)").addClass("on");
		$("#imprint-lang-switch p:nth-child(2)").addClass("on");
		
	});
	
	$("#terms-lang-switch p:nth-child(1)").click(function(e) {
	
		$("#terms-switch-container input").removeClass("on");
		$("#terms-lang-switch p").removeClass("on");
		$("#terms-switch-container input:nth-child(1)").addClass("on");
		$("#terms-lang-switch p:nth-child(1)").addClass("on");
		
	});
	
	$("#terms-lang-switch p:nth-child(2)").click(function(e) {
	
		$("#terms-switch-container input").removeClass("on");
		$("#terms-lang-switch p").removeClass("on");
		$("#terms-switch-container input:nth-child(2)").addClass("on");
		$("#terms-lang-switch p:nth-child(2)").addClass("on");
		
	});
	
	$("#miscone-lang-switch p:nth-child(1)").click(function(e) {
	
		$("#miscone-switch-container p").removeClass("on");
		$("#miscone-lang-switch p").removeClass("on");
		$("#miscone-switch-container p:nth-child(1)").addClass("on");
		$("#miscone-lang-switch p:nth-child(1)").addClass("on");
		
	});
	
	$("#miscone-lang-switch p:nth-child(2)").click(function(e) {
	
		$("#miscone-switch-container p").removeClass("on");
		$("#miscone-lang-switch p").removeClass("on");
		$("#miscone-switch-container p:nth-child(2)").addClass("on");
		$("#miscone-lang-switch p:nth-child(2)").addClass("on");
		
	});
	
	$("#misctwo-lang-switch p:nth-child(1)").click(function(e) {
	
		$("#misctwo-switch-container textarea").removeClass("on");
		$("#misctwo-lang-switch p").removeClass("on");
		$("#misctwo-switch-container textarea:nth-child(1)").addClass("on");
		$("#misctwo-lang-switch p:nth-child(1)").addClass("on");
		
	});

	$("#misctwo-lang-switch p:nth-child(2)").click(function(e) {
	
		$("#misctwo-switch-container textarea").removeClass("on");
		$("#misctwo-lang-switch p").removeClass("on");
		$("#misctwo-switch-container textarea:nth-child(2)").addClass("on");
		$("#misctwo-lang-switch p:nth-child(2)").addClass("on");
		
	});

	$("#miscthree-lang-switch p:nth-child(1)").click(function(e) {
	
		$("#miscthree-switch-container textarea").removeClass("on");
		$("#miscthree-lang-switch p").removeClass("on");
		$("#miscthree-switch-container textarea:nth-child(1)").addClass("on");
		$("#miscthree-lang-switch p:nth-child(1)").addClass("on");
		
	});

	$("#miscthree-lang-switch p:nth-child(2)").click(function(e) {
	
		$("#miscthree-switch-container textarea").removeClass("on");
		$("#miscthree-lang-switch p").removeClass("on");
		$("#miscthree-switch-container textarea:nth-child(2)").addClass("on");
		$("#miscthree-lang-switch p:nth-child(2)").addClass("on");
		
	});
	
	$("#miscfour-lang-switch p:nth-child(1)").click(function(e) {
	
		$("#miscfour-switch-container p").removeClass("on");
		$("#miscfour-lang-switch p").removeClass("on");
		$("#miscfour-switch-container p:nth-child(1)").addClass("on");
		$("#miscfour-lang-switch p:nth-child(1)").addClass("on");
		
	});

	$("#miscfour-lang-switch p:nth-child(2)").click(function(e) {
	
		$("#miscfour-switch-container p").removeClass("on");
		$("#miscfour-lang-switch p").removeClass("on");
		$("#miscfour-switch-container p:nth-child(2)").addClass("on");
		$("#miscfour-lang-switch p:nth-child(2)").addClass("on");
		
	});
	
	$("#miscfive-lang-switch p:nth-child(1)").click(function(e) {
	
		$("#miscfive-switch-container p").removeClass("on");
		$("#miscfive-lang-switch p").removeClass("on");
		$("#miscfive-switch-container p:nth-child(1)").addClass("on");
		$("#miscfive-lang-switch p:nth-child(1)").addClass("on");
		
	});

	$("#miscfive-lang-switch p:nth-child(2)").click(function(e) {
	
		$("#miscfive-switch-container p").removeClass("on");
		$("#miscfive-lang-switch p").removeClass("on");
		$("#miscfive-switch-container p:nth-child(2)").addClass("on");
		$("#miscfive-lang-switch p:nth-child(2)").addClass("on");
		
	});
	
	
	
	
	
	$("#miscinput-lang-switch p:nth-child(1)").click(function(e) {
	
		$("#miscinput-switch-container input").removeClass("on");
		$("#miscinput-lang-switch p").removeClass("on");
		$("#miscinput-switch-container input:nth-child(1)").addClass("on");
		$("#miscinput-lang-switch p:nth-child(1)").addClass("on");
		
	});

	$("#miscinput-lang-switch p:nth-child(2)").click(function(e) {
	
		$("#miscinput-switch-container input").removeClass("on");
		$("#miscinput-lang-switch p").removeClass("on");
		$("#miscinput-switch-container input:nth-child(2)").addClass("on");
		$("#miscinput-lang-switch p:nth-child(2)").addClass("on");
		
	});
	
	
	
	
	
	


});