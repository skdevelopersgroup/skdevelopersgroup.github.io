//BX SLIDER//
$(document).ready(function(){
$('.slider1').bxSlider({
     auto: true
  });

$('.sliderth1').bxSlider({
    auto: true,
	slideWidth: 195,
    minSlides: 2,
    maxSlides: 3,
	moveSlides: 3
	});
	
});

$(document).ready(function(e) {
$("#cname").attr("placeholder","Name*");
$("#cemail").attr("placeholder","Email*");
$("#cphone").attr("placeholder","Phone*");
//$("#cstate").attr("placeholder","State*");
//$("#ccity").attr("placeholder","City*");
//$("#cstate option:first").html("State*");
//$("#cprograme option:first").html("Program of Interest*");
$("textarea").attr("placeholder","Query");
 
//$("#brochure").click(function() {
//$("#brochure_message").toggle("slow", function() {

$('#brochure_message').hide();
$('#brochure').hover( function() { $('#brochure_message').toggle(); } );
});

$(document).ready(function(){
$('.fancybox').fancybox();
			
			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});
			
			
			$('.fancybox-buttons1').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});
});