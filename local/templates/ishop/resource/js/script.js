$(document).ready(function(){
	/*Lightgallery plugin*/
	$(document).ready(function() {
        $(".lightgallery").lightGallery({
        	download: false,
        }); 
    });

    /*input mask plugin*/

    $('input.phone').inputmask({
		mask: '+7 (999) 999 - 99 - 99',
		showMaskOnHover: false,
        showMaskOnFocus: true,
	});

	/*bootstrap popover*/
    $(function () {
	  $('[data-toggle="popover"]').popover()
	})

    $('.lightgallery-open-link').click(function(event) {
    	event.preventDefault();
    	var galleryTarget = $(this).data('gallery-target');
    	$(galleryTarget).find('a:eq(0)').trigger('click');
    	
    });


    /*animation*/
    $(window).load(function(){
		var winHeight = window.innerHeight ?
        function() {
            return window.innerHeight;
        } :
        function() {
            return document.documentElement.clientHeight;
        };
        winHeight = winHeight();
		$('.scroll-animate').each(function () {
			var block = $(this);
		    var top = block.offset().top+0;
		    top = top - winHeight;
		    var scroll_top = $(window).scrollTop();
		    if ((scroll_top > top)) {
		        if (!block.hasClass('animate')) {
		          	block.addClass('animate');
		        }
		    }
		    else {
		    
		    }
		});
  	});
  	$(window).on('scroll',function() {
  		var winHeight = window.innerHeight ?
        function() {
            return window.innerHeight;
        } :
        function() {
            return document.documentElement.clientHeight;
        };
        winHeight = winHeight();
			$('.scroll-animate').each(function () {
	      	var block = $(this);
		    var top = block.offset().top+50;
		    top = top - winHeight;
		    var scroll_top = $(window).scrollTop();
		    if ((scroll_top > top)) {
		        if (!block.hasClass('animate')) {
		          	block.addClass('animate');
		        }
		    }
		    else {
				
		    }
		});
	});


	/*main-navbar toggle*/
	$('body').on('click', '.main-navbar__nav-toggle', function(event) {
		event.preventDefault();
		$(this).toggleClass('active');
		$('.main-navbar__nav').toggleClass('open');
	});

	/*fixed catalog menu*/
	$(window).scroll(function(event) {
		var scrollTop = $(this).scrollTop();
		var mainNavbarheight = $('.main-navbar').outerHeight();

		if (scrollTop > mainNavbarheight) {
			$('.catalog-navbar').addClass('fixed');
		}else {
			$('.catalog-navbar').removeClass('fixed');
		}
	});

	/*search btn*/
	$('body').on('click', '.catalog-navbar__search-btn', function(event) {
		event.preventDefault();
		$(this).toggleClass('active');

		$('.main-header__form-search').toggleClass('open');
		setTimeout(function(){
			$('.main-header__form-search__field').focus();
		},400);
	});


	/*hero slider*/
	$('.js-hero-slider').slick({
		dots: true,
		arrows: true,
		autoplay: true,
		autoplaySpeed: 7000,
	});

	$(window).load(function() {
		$.each($('.hero-slider .slick-active').find('.animate'), function(i, el){
			var elAnimation = $(el).data('animate');
		    setTimeout(function(){
				$(el).addClass('animated').addClass(elAnimation);
		    },200 + ( i * 500 ));
		    $(el).removeClass('animated').removeClass(elAnimation);
		});
	});
	$('.js-hero-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
		
		$.each($('.hero-slider .slick-slide').find('.animate'), function(i, el){
			var elAnimation = $(el).data('animate');
		    $(el).removeClass('animated').removeClass(elAnimation);
		});
	});
	$('.js-hero-slider').on('afterChange', function(event, slick, currentSlide, nextSlide){

		$.each($('.hero-slider .slick-active').find('.animate'), function(i, el){
			var elAnimation = $(el).data('animate');
		    setTimeout(function(){
				$(el).addClass('animated').addClass(elAnimation);
		    },0 + ( i * 500 ));
		    $(el).removeClass('animated').removeClass(elAnimation);
		});
	});


	/*product-slider*/
	$('.js-product-slider').slick({
		arrows: true,
		dots: false,
		slidesToShow: 4,
		slidesToScroll: 1,
		draggable: true,
		swipe: true,

		responsive: [
		    {
		      	breakpoint: 991,
		      	settings: {
			        slidesToShow: 3,
			     }
		    },
		    {
		      	breakpoint: 767,
		      	settings: {
			        slidesToShow: 2,
			     }
		    },
		    {
		      	breakpoint: 520,
		      	settings: {
			        slidesToShow: 1,
			     }
		    }
		]
	});



	/*filter*/
	$(".range-slider__input").ionRangeSlider({
		type: 'double',
		hide_min_max: true,
		hide_from_to: true,
		onStart: function(data){
			$(data.input).parent().find('.range-slider-from').val(data.from);
			$(data.input).parent().find('.range-slider-to').val(data.to);
		},
		onChange: function(data){
			$(data.input).parent().find('.range-slider-from').val(data.from);
			$(data.input).parent().find('.range-slider-to').val(data.to);
		}
	});

	$('.range-slider-from').on('input change',function(event) {
		var thisVal = $(this).val();
		var slider = $(this).parents('.ranger-slider').find('.range-slider__input').data("ionRangeSlider");
		slider.update({
		    from: thisVal,
		});
	});

	$('.range-slider-to').change(function(event) {
		var thisVal = $(this).val();
		var slider = $(this).parents('.ranger-slider').find('.range-slider__input').data("ionRangeSlider");
		slider.update({
		    to: thisVal,
		});
	});


	$('.filter-item__title').click(function(event) {
		$(this).parent().find('.filter-item__body').slideToggle(400);
	});


	/*catalog sort*/
	$('.catalog-sort').on('click', '.sort-by__select', function(event) {
		event.preventDefault();
		if ($(this).hasClass('selected')) {
			$(this).toggleClass('selected-up');
		}else {
			$('.catalog-sort .sort-by__select').removeClass('selected').removeClass('selected-up');
			$(this).addClass('selected');
		}
	});

	/*catalog slider*/
	$('.js-catalog-item-slider').slick({
		arrows: false,
		dots: true,
		autoplay: true,
		autoplaySpeed: 5000,
		fade: true,
	});

	/*available color-select*/
	$('.available-color input.color-select').each(function(index, el) {
		var $availableColor = $(this).parents('.available-color');
		var selectedColorName = $availableColor.find('input.color-select:checked').val();
		$availableColor.find('.available-color__selected span').text(selectedColorName);
	});
	$('.available-color input.color-select').change(function(event) {
		var $availableColor = $(this).parents('.available-color');
		var selectedColorName = $availableColor.find('input.color-select:checked').val();
		$availableColor.find('.available-color__selected span').text(selectedColorName);
	});


	/*contacts gallery*/
	$('.where-tobuy__gallery-full').on('click', '.where-tobuy__gallery-full-btn', function(event) {
		event.preventDefault();
		if ($(this).hasClass('active')) {
			$(this).html(whereToBuyBtnHtml);
			$(this).removeClass('active')
		}else {
			whereToBuyBtnHtml = $(this).html();
			$(this).addClass('active')
			$(this).html('Скрыть часть фотографий')
		}
		$(this).parents('.where-tobuy__gallery').find('.lightgallery>a').toggleClass('is-show');
	});


	/*cabinet*/
	$('.order-item__number').click(function(event) {
		event.preventDefault();
		$(this).toggleClass('active');
		$(this).parents('.order-item').find('.order-item__body').slideToggle(400);
	});


	/*cart*/

	//amount btn
	$('.amount').on('click', '.amount-btn', function(event) {
		event.preventDefault();
		var thisAction = $(this).data('action');
		var amountVal = $(this).parent().find('.amount-input').val();

		if (thisAction == 'decrease') {
			amountVal--;
			if (amountVal>0) {
				$(this).parent().find('.amount-input').val(amountVal);
			}
			
		}else {
			amountVal++;
			$(this).parent().find('.amount-input').val(amountVal);
		}
	});

	//remove cart-item
	$('.cart-item__remove').click(function(event) {
		event.preventDefault();
		var $parent = $(this).parents('.cart-item');

		//сначала добавляем класс который анимирует удаление
		$parent.addClass('delete');
		//затем удаляем элемент из DOM
		setTimeout(function(){
			$parent.remove();
		},400);
	});


	/*contacts map*/

	if (typeof google != 'undefined') {
		google.maps.event.addDomListener(window, 'load', init);

		
		var mapLng = $('#map').data('lng');
	    var mapLngArr = mapLng.split(',');
	    function toObject(mapLngArr) {
		  mapLngObj = {};
		  for (var i = 0; i < mapLngArr.length; ++i)
		    mapLngObj[i] = mapLngArr[i];
		  return mapLngObj;
		}
		toObject(mapLngArr);
		var mapLng1 = parseFloat(mapLngObj[0]);
		var mapLng2 = parseFloat(mapLngObj[1]);


	    function init() {
	        var map = new google.maps.Map(document.getElementById('map'), {
	            center: new google.maps.LatLng(mapLng1,mapLng2),
	            zoom: 17,
	            zoomControl: true,
	            zoomControlOptions: {
	                style: google.maps.ZoomControlStyle.SMALL,
	            },
	            disableDoubleClickZoom: true,
	            mapTypeControl: false,
	            scaleControl: false,
	            scrollwheel: false,
	            panControl: false,
	            streetViewControl: false,
	            draggable : true,
	            overviewMapControl: false,
	            overviewMapControlOptions: {
	                opened: false,
	            },
	            mapTypeId: google.maps.MapTypeId.ROADMAP,
	        });
	    
	        var markericon = 'img/map-pin.png';
	        var marker = new google.maps.Marker({
	            icon: markericon,
	            position: new google.maps.LatLng(mapLng1, mapLng2),
	            map: map,
	        });


	        google.maps.event.addDomListener(window, "resize", function() {
	            var center = map.getCenter();
	            google.maps.event.trigger(map, "resize");
	            map.setCenter(center); 
	        });

	        $('a[data-lng]').click(function(event) {
		    	event.preventDefault();
		    	var mapLng = $(this).data('lng');
		    	var mapLngArr = mapLng.split(',');

		    	function toObject(mapLngArr) {
				  mapLngObj = {};
				  for (var i = 0; i < mapLngArr.length; ++i)
				    mapLngObj[i] = mapLngArr[i];
				  return mapLngObj;
				}
				toObject(mapLngArr);
				var mapLng1 = parseFloat(mapLngArr[0]);
				var mapLng2 = parseFloat(mapLngArr[1]);
				console.log(mapLng1+" "+mapLng2);

		    	map.setCenter(new google.maps.LatLng(mapLng1, mapLng2));
		    	marker.setPosition(new google.maps.LatLng(mapLng1, mapLng2));

		    	$('.map').addClass('fade-map');
		    	setTimeout(function() {
		    		$('.map').removeClass('fade-map');
		    	},250);
		    });
	    }
	}






	console.log($('select').val())

	/*form validate*/
	//Функция проверки на валидность
	function validate(field, type) {
		var pp = '';

		if(type === 'email'){
			pp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		}

		if(type === 'onlyNumber'){
			pp = /^([0-9()\/+ -]+)$/;
		}

		if(type == 'phone'){
			pp = /^\+?[\d()\-\s]*\d+\s*$/;
		}

		if(type === 'password'){
			pp = /^[A-Za-zА-Яа-я0-9 _]*[A-Za-zА-Яа-я0-9][A-Za-zА-Яа-я0-9 _#()$@$!%*#?&/\n]{4,}$/;
		}

		if(type === 'notEmpty'){
			pp = /^[A-Za-zА-Яа-я0-9 _]*[A-Za-zА-Яа-я0-9][A-Za-zА-Яа-я0-9 _#()$@8%№;'":,.+?!#*-/\n]*$/;
		}

		if(type === 'select'){
			pp = /^[A-Za-zА-Яа-я0-9 _]*[A-Za-zА-Яа-я0-9][A-Za-zА-Яа-я0-9 _#()/\n]*$/;
		}

		if(!field.match(pp)){
			return false;
		}
		return true;
	}

	var required = 0;
	var validated = 0;

	//проверяем валидность при изменение текста в инпутах
	$('body').on('input select', '.required',function(){
  		var fieldType = $(this).data('validate');

		if(!validate($(this).val(), fieldType)) {
  			$(this).parent().removeClass('has-success').addClass('has-error');

  		} else {
  			$(this).parent().removeClass('has-error').addClass('has-success');
  		}

	  	required = $(this).parents('form').find('.required').length;
		validated = $(this).parents('form').find('.has-success').length;
	});


    //проверяем валидность когда нажимается конпка
	$('form').on( "submit", function( event ){

		var $form = $(this);


	  	//проверяем обязательные поля на валидность
	  	$form.find('.required').each(function(){
	  		var fieldType = $(this).data('validate');
			if(!validate($(this).val(), fieldType)) {
	  			$(this).parent().removeClass('has-success').addClass('has-error');
	  		} else {
	  			$(this).parent().removeClass('has-error').addClass('has-success');
	  		}
		});


	  	required = $form.find('.required').length;
		validated = $form.find('.has-success').length;

        //если нет ошибок
		if (required === validated){;
			return true;
		} else {
			return false;
		}
	});

});