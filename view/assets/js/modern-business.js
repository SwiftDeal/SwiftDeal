// Activates the Carousel
$('.carousel').carousel({
  interval: 5000
});

// Activates Tooltips for Social Links
$('.tooltip-social').tooltip({
  selector: "a[data-toggle=tooltip]"
});

$(function(){
	$('#demo_box').popmenu({
	  'controller': true,
	  'width': '300px',
	  'background': '#34495e',
	  'focusColor': '#1abc9c',
	  'borderRadius': '10px',
	  'top': '50',
	  'left': '0',
	  'iconSize': '100px'
	});
	$('#demo_box_2').popmenu({'background':'#e67e22','focusColor':'#c0392b','borderRadius':'0'});
});

$('.carousel').carousel({
  interval: 1000
})
