(function($) {
	$.fn.scrollPagination = function(options) {		
		var settings = { 
			nop     : 7,
			offset  : 0,
			error   : '', 
			delay   : 500, 
			scroll  : true
		}		
		if(options) {
			$.extend(settings, options);
		}		
		return this.each(function() {			
			// Some variables 
			$this = $(this);
			$settings = settings;
			var offset = $settings.offset;
			var busy = false; 
			
			if($settings.scroll == true) $initmessage = '<br><br><br><br><br><br><br><br><br><img src="../img/loader.gif" />';
			else $initmessage = 'Click for more content';
			
			$this.append('<div class="content"></div><div class="loading-bar" style="margin-top:125px">'+$initmessage+'</div>');
			
			function getData() {
				
				$.post('../sites/get-posts.php', {
						
					action        : 'scrollpagination',
				    number        : $settings.nop,
				    offset        : offset,
					    
				}, function(data) {
						
					$this.find('.loading-bar').html('');
						
					if(data == "") { 
						$this.find('.loading-bar').html($settings.error);	
					}
					else {
						
					    offset = offset+$settings.nop; 
						    
					   	$this.find('.content').append(data);

						busy = false;
					}	
						
				});
					
			}	
			
			getData(); 
			
			if($settings.scroll == true) {

				$(window).scroll(function() {
					
					if($(window).scrollTop() + $(window).height() > $this.height() && !busy) {
						
						busy = true;
						
						$this.find('.loading-bar').html('<img src="../img/loader.gif" />');

						setTimeout(function() {
							
							getData();
							
						}, $settings.delay);
							
					}	
				});
			}
			
			$this.find('.loading-bar').click(function() {
			
				if(busy == false) {
					busy = true;
					getData();
				}
			
			});
			
		});
	}

})(jQuery);
