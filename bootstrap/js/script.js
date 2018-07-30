
$('.page-scroll').on('click', function(e){

	//ambil isi href
	var tujuan = $(this).attr('href');

	//tangkap elemen 
	var elemenTujuan = $(tujuan);

	//pindahkan scroll

	$('html, body').animate({
		scrollTop: elemenTujuan.offset().top -200
	},2000, 'easeInOutExpo');	

	e.preventDefault();
	
});

// Parallax Effect

// About
$(window).on('load', function(){
	$('.jKanan').addClass('muncul');
	$('.jKiri').addClass('muncul');
	$('.button-banner').addClass('muncul');
});

$(window).scroll(function(){
	var wScroll = $(this).scrollTop();



	$('.jKanan').removeClass('jKanan');
	$('.jKiri').removeClass('jKiri');
	$('.btn1').removeClass('btn1');
	$('.kanan').css({
		'transform' : 'translate(0px, '+ wScroll/1 +'%)'
	})
	
	$('.kiri').css({
		'transform' : 'translate(0px, '+ wScroll/1.2 +'%)'
	});

	$('.button-banner').css({
		'transform' : 'translate(0px, '+ wScroll/2 +'%)'
	})

	if(wScroll > $('#about').offset().top-250){
		$('.navbar').addClass('fixed');
	}
	else {
		$('.navbar').removeClass('fixed');		
	}

	if(wScroll > $('#about').offset().top-700){
		$('#about .judul').addClass('muncul');
		$('#about hr').addClass('muncul');
	}

	if(wScroll > $('#features').offset().top-550){
		$('#features .judul').addClass('muncul');
		$('#features .hr2').addClass('muncul');
	}

	if(wScroll > $('#features').offset().top-180){
		$('.box1 .top').each(function(i){
			setTimeout(function(){
				$('.box1 .top').eq(i).addClass('muncul');
			},600 * (i))
		});
		
	}

	if(wScroll > $('#features').offset().top+300){
		$('.box2 .bot').each(function(i){
			setTimeout(function(){
				$('.box2 .bot').eq(i).addClass('muncul');
			}, 600 * (i))
		});


	}

	// Profiles

	if(wScroll > $('#profiles').offset().top-700){
		$('#profiles h3').addClass('muncul');
	}

	if(wScroll > $('#profiles').offset().top-300){
		$('.pict .foto').each(function(i){
			setTimeout(function(){
				$('.pict .foto').eq(i).addClass('muncul');
			}, 400 * (i))
		})
	}


})