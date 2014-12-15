//Set Cofon
Cufon.replace('h1');
Cufon.replace('h2', { hover: true, hoverables: { h2: true } });
Cufon.replace('h3', { hover: true, hoverables: { h3: true } });
Cufon.replace('h4', { hover: true, hoverables: { h4: true } });
Cufon.replace('h5', { hover: true, hoverables: { h5: true } });
Cufon.replace('h6', { hover: true, hoverables: { h6: true } });

//from function
$(document).ready(function() {
	$('.searchInput').click(function(){
		$(this).val(''); // hide "search" text when focused.
	});
});

//lightbox function
$(document).ready(function() {
	$('.lightbox img').hover(function(){
		$(this).fadeTo('fast', 0.7);
	}, function() {
		$(this).fadeTo('fast', 1);
	});
});

//large gallery function
$(document).ready(function() {
	$('.galleryLarge .imgDesc').hide();
	$('.galleryLarge').hover(function(){
		$(this).children('.imgDesc').slideDown('fast');
	}, function() {
		$(this).children('.imgDesc').slideUp('fast');
	});
});

//validation function
jQuery(document).ready(function($){
	$("#commentForm").validate();
	$("#contactForm").validate();
});

//toggle function
$(document).ready(function(){
	$('.toggle p').hide();
	$('.readmore').toggle(function(){
		var $this = $(this);
		$this.parents('.toggle').children('p').slideDown('normal');
		$this.text('[-]');
	}, function(){
		var $this = $(this);
		$this.parents('.toggle').children('p').slideUp('normal');
		$this.text('[+]');
	});
});