var linksNavBar = $("ul.navbar-nav > li > a");
var altura = $('#navegacao').offset().top;

linksNavBar.click(function(event){
	var position = $(this.hash).offset() ? $(this.hash).offset() : '' ;
	var heightMenu = ($(window).scrollTop() < altura) ? 100 : 50;
	event.preventDefault();

	if(!$(this.hash).offset()){
	   $('ul.navbar-nav > li').removeClass('active');
	   $(this).parent().addClass('active');
	} else {
		$("html, body").animate({scrollTop:position.top-heightMenu}, 1200);
	}
});

$('#modalContato').on('hidden.bs.modal', function (e) {
   $('ul.navbar-nav > li').removeClass('active');
   CheckActive();
});

$(window).scroll(function(){
	var scrollTopAtual = $(this).scrollTop();
	var navegacao = $('#navegacao');

	CheckActive();

	if ( $(window).scrollTop() > altura ) {
		navegacao.addClass('navegacao-fixa');
	}
	else {
		navegacao.removeClass('navegacao-fixa');
	}
});

$("#slider").owlCarousel({
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true
});

function CheckActive()
{
	linksNavBar.each(function(){
		var positionTop = $(this.hash).offset() ? $(this.hash).offset().top : 999999;

		if(positionTop-250 <= $(window).scrollTop()){
			$('ul.navbar-nav > li').removeClass('active');
			$(this).parent().addClass('active');
		}
	});
}

// Use jQuery com a variavel $j(...)
var $j = jQuery.noConflict();
$j(document).ready(function() {
$j(".voltarTopo").hide();
$j(function () {
$j(window).scroll(function () {
if ($j(this).scrollTop() > 0) {
$j('.voltarTopo').fadeIn();
} else {
$j('.voltarTopo').fadeOut();
}
});
$j('.voltarTopo').click(function() {
$j('body,html').animate({scrollTop:0},600);
}); 
    });});
