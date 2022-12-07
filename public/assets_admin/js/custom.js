(function($) {
    "use strict";
	
		
	// Search
	$('body, .navbar-collapse form[role="search"] button[type="reset"]').on('click keyup', function(event) {
		console.log(event.currentTarget);
		if (event.which == 27 && $('.navbar-collapse form[role="search"]').hasClass('active') ||
			$(event.currentTarget).attr('type') == 'reset') {
			closeSearch();
		}
	});

	function closeSearch() {
		var $form = $('.navbar-collapse form[role="search"].active')
		$form.find('input').val('');
		$form.removeClass('active');
	}

	// Show Search if form is not active // event.preventDefault() is important, this prevents the form from submitting
	$(document).on('click', '.navbar-collapse form[role="search"]:not(.active) button[type="submit"]', function(event) {
		event.preventDefault();
		var $form = $(this).closest('form'),
			$input = $form.find('input');
		$form.addClass('active');
		$input.focus();

	});
	// ONLY FOR DEMO // Please use $('form').submit(function(event)) to track from submission
	// if your form is ajax remember to call `closeSearch()` to close the search container
	$(document).on('click', '.navbar-collapse form[role="search"].active button[type="submit"]', function(event) {
		event.preventDefault();
		var $form = $(this).closest('form'),
			$input = $form.find('input');
		$('#showSearchTerm').text($input.val());
		closeSearch()
	});
	
	//Prfoile buttons
	$(document).on("click",".profile-settings a", function(e) {
		$('.profile-buttons').toggleClass('profile-buttons-active');
		$('.profile-settings').toggleClass('profile-settings-active');
	});
	
	//Modal Popup
	$(document).on("click",".phone-button", function(e) {
		$('body').addClass('modal-open1');
	});
	
	//Switcher
	$(document).on("click", "a[data-switcher]", function(e) {
		$("head link#switcher").attr("href", $(this).data("switcher"));
		$(this).toggleClass('active').siblings().removeClass('active');
	});
	
	//Color
	$(document).on("click", "a[data-color]", function(e) {
		$("head link#color").attr("href", $(this).data("color"));
		$(this).toggleClass('active').siblings().removeClass('active');
	});
	
	/*Header Styles*/
	$(document).on('click', '#myonoffswitch', function(e){
		if (this.checked) {
			$('body').addClass('horizontal-conatiner');
			localStorage.setItem("horizontal-conatiner", "True");
		}
		else {
			$('body').removeClass('horizontal-conatiner');
			localStorage.setItem("horizontal-conatiner", "false");
		}
	});
	
	/*Background Gradient*/
	$(document).on('click', '#myonoffswitch1', function(e){
		if (this.checked) {
			$('body').addClass('bg-gradient');
			$('body').removeClass('bg-pattern');
			$('body').removeClass('bg-image');
			localStorage.setItem("bg-gradient", "True");
		}
		else {
			$('body').removeClass('bg-gradient');
			localStorage.setItem("bg-gradient", "false");
		}
	});
	
	/*Background Pattern*/
	$(document).on('click', '#myonoffswitch2', function(e){
		if (this.checked) {
			$('body').addClass('bg-pattern');
			$('body').removeClass('bg-gradient');
			$('body').removeClass('bg-image');
			localStorage.setItem("bg-pattern", "True");
		}
		else {
			$('body').removeClass('bg-pattern');
			localStorage.setItem("bg-pattern", "false");
		}
	});
	
	/*Background Pattern*/
	$(document).on('click', '#myonoffswitch3', function(e){
		if (this.checked) {
			$('body').addClass('bg-image');
			$('body').removeClass('bg-gradient');
			$('body').removeClass('bg-pattern');
			localStorage.setItem("bg-image", "True");
		}
		else {
			$('body').removeClass('bg-image');
			localStorage.setItem("bg-image", "false");
		}
	});
	
	/*Background Pattern*/
	$(document).on('click', '#myonoffswitch4', function(e){
		if (this.checked) {
			$('body').addClass('dark-mode');
			localStorage.setItem("dark-mode", "True");
		}
		else {
			$('body').removeClass('dark-mode');
			localStorage.setItem("dark-mode", "false");
		}
	});

	// ______________Nice Select	
	$('select.nice-select').niceSelect();
	
	// ______________Full Screen
	$(document).on("click",".fullscreen-button", function toggleFullScreen() {
		if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
			if (document.documentElement.requestFullScreen) {
			  document.documentElement.requestFullScreen();
			} else if (document.documentElement.mozRequestFullScreen) {
			  document.documentElement.mozRequestFullScreen();
			} else if (document.documentElement.webkitRequestFullScreen) {
			  document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
			} else if (document.documentElement.msRequestFullscreen) {
			  document.documentElement.msRequestFullscreen();
			}
		} else {
			if (document.cancelFullScreen) {
			  document.cancelFullScreen();
			} else if (document.mozCancelFullScreen) {
			  document.mozCancelFullScreen();
			} else if (document.webkitCancelFullScreen) {
			  document.webkitCancelFullScreen();
			} else if (document.msExitFullscreen) {
			  document.msExitFullscreen();
			}
		}
	})

	// ______________Updated Chart
    var updatingChart = $(".updating-chart").peity("line", { width: "100%",height:100 ,fill: "#8966f7",  stroke: "#531270"})
    setInterval(function() {
        var random = Math.round(Math.random() * 30)
        var values = updatingChart.text().split(",")
        values.shift()
        values.push(random)

        updatingChart
            .text(values.join(","))
            .change()
    }, 1000)

	 // ______________Headerfixed
	$(window).on("scroll", function(e){
		if ($(window).scrollTop() >= 66) {
			$('header').addClass('fixed-header');
		}
		else {
			$('.header').removeClass('fixed-header');
		}
    });
	$(".sparkline_bar1").sparkline([5, 4, 5, 4, 3, 4, 5, 6, 4, 5, 6, 3, 2], {
		type: 'bar',
		height: 50,
		width:"100%",
		barSpacing: 4,
		colorMap: {
			'9': '#a1a1a1'
		},
		barColor: '#43d7ef'
	});

	$(".sparkline_bar").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5], {
		type: 'bar',
		height: 50,
		height: 50,
		width:"100%",
		colorMap: {
			'9': '#a1a1a1'
		},
		barColor: '#f5365c',
		barSpacing: 4
	});

	$(".sparkline23").sparkline([2, 4, 3, 4, 7, 5, 4, 3, 5, 6, 2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 6], {
		type: 'line',
		height: '50',
		width: '110',
		lineColor: '#8966f7',
		fillColor: '#ffffff',
		lineWidth: 3,
		spotColor: '#8966f7',
		minSpotColor: '#8966f7'
	});
	
	$(".sparkline22").sparkline([2, 4, 3, 4, 7, 5, 4, 3, 5, 6, 2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 6], {
		type: 'line',
		height: '50',
		width: '110',
		lineColor: '#009a3e',
		fillColor: '#ffffff',
		lineWidth: 3,
		spotColor: '#009a3e',
		minSpotColor: '#009a3e'
	});

	// ______________ Chart Circle
	if ($('.chart-circle').length) {
		$('.chart-circle').each(function() {
			let $this = $(this);

			$this.circleProgress({
			  fill: {
				color: $this.attr('data-color')
			  },
			  size: $this.height(),
			  startAngle: -Math.PI / 4 * 2,
			  emptyFill: 'rgba(119, 119, 142, 0.2)',
			  lineCap: 'round'
			});
		});
	}

	// ______________Cover Image
	$(".cover-image").each(function() {
		var attr = $(this).attr('data-image-src');
		if (typeof attr !== typeof undefined && attr !== false) {
			$(this).css('background', 'url(' + attr + ') center center');
		}
	});

	// ______________Active Class
	$(".app-sidebar a").each(function() {
		var pageUrl = window.location.href.split(/[?#]/)[0];
		if (this.href == pageUrl) {
			$(this).addClass("active");
			$(this).parent().addClass("active"); // add active to li of the current link
			$(this).parent().parent().prev().addClass("active"); // add active class to an anchor
			$(this).parent().parent().prev().click(); // click the item to make it drop
		}
	});

	// ______________ PAGE LOADING
	$(window).on("load", function(e) {
		$("#global-loader").fadeOut("slow");
	})

	// ______________ CountUp
	$('.counter').countUp();

	// ______________ BACK TO TOP BUTTON
	$(window).on("scroll", function(e) {
    	if ($(this).scrollTop() > 300) {
            $('#back-to-top').fadeIn('slow');
        } else {
            $('#back-to-top').fadeOut('slow');
        }
    });

    $("#back-to-top").on("click", function(e){
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

	// ______________ Start rating
	var ratingOptions = {
		selectors: {
			starsSelector: '.rating-stars',
			starSelector: '.rating-star',
			starActiveClass: 'is--active',
			starHoverClass: 'is--hover',
			starNoHoverClass: 'is--no-hover',
			targetFormElementSelector: '.rating-value'
		}
	};
	$(".rating-stars").ratingStars(ratingOptions);
	
	// ______________ mCustomScrollbar
	$(".vscroll").mCustomScrollbar();
	$(".scroll-1").mCustomScrollbar();
	$(".scroll-2").mCustomScrollbar();
	$(".scroll-3").mCustomScrollbar({
		axis:"yx",
		theme:"dark-thin",
		autoExpandScrollbar:true,
		advanced:{autoExpandHorizontalScroll:true}
	});
	$(".app-sidebar").mCustomScrollbar({
		theme:"minimal",
		autoHideScrollbar: true
	});	
	$(".sidebar").mCustomScrollbar({
		theme:"minimal",
		autoHideScrollbar: true
	});	

	//horizontal scrollbar
	$("#content-5").mCustomScrollbar({
		axis:"x",
		theme:"dark-thin",
		autoExpandScrollbar:true,
		advanced:{autoExpandHorizontalScroll:true}
	});

	//horizontalmenu
	$("a[data-theme]").on("click", function(e) {
		$("head link#theme").attr("href", $(this).data("theme"));
		$(this).toggleClass('active').siblings().removeClass('active');
	});
	$("a[data-effect]").on("click", function(e) {
		$("head link#effect").attr("href", $(this).data("effect"));
		$(this).toggleClass('active').siblings().removeClass('active');
	});
	
	//Increment & Decrement
	var quantitiy=0;
	$('.quantity-right-plus').on('click', function(e){
		e.preventDefault();
		var quantity = parseInt($('.quantity').val());
		$('.quantity').val(quantity + 1);

	});
	$('.quantity-left-minus').on('click', function(e){
		e.preventDefault();
		var quantity = parseInt($('.quantity').val());
		if(quantity>0){
			$('.quantity').val(quantity - 1);
		}
	});

	//calender2
	$('#calendar').tuiCalendar;

	/*----GlobalSearch----*/
	$(document).on("click", "[data-toggle='search']", function(e) {
		var body = $("body");

		if(body.hasClass('search-gone')) {
			body.addClass('search-gone');
			body.removeClass('search-show');
		}else{
			body.removeClass('search-gone');
			body.addClass('search-show');
		}
	});
	var toggleSidebar = function() {
		var w = $(window);
		if(w.outerWidth() <= 1024) {
			$("body").addClass("sidebar-gone");
			$(document).off("click", "body").on("click", "body", function(e) {
				if($(e.target).hasClass('sidebar-show') || $(e.target).hasClass('search-show')) {
					$("body").removeClass("sidebar-show");
					$("body").addClass("sidebar-gone");
					$("body").removeClass("search-show");
				}
			});
		}else{
			$("body").removeClass("sidebar-gone");
		}
	}
	toggleSidebar();
	$(window).resize(toggleSidebar);

	$(document).ready(function(){
		$(".slide-toggle").click(function(){
            $(".right-sidebarbox").animate({
                width: "toggle"
            });
        });
	});


})(jQuery);

$(function(e) {
		  /** Constant div card */
	  const DIV_CARD = 'div.card';
	  /** Initialize tooltips */
	  $('[data-toggle="tooltip"]').tooltip();

	  /** Initialize popovers */
	  $('[data-toggle="popover"]').popover({
		html: true
	  });
			 /** Function for remove card */
	  $('[data-toggle="card-remove"]').on('click', function(e) {
		let $card = $(this).closest(DIV_CARD);

		$card.remove();

		e.preventDefault();
		return false;
	  });

	  /** Function for collapse card */
	  $('[data-toggle="card-collapse"]').on('click', function(e) {
		let $card = $(this).closest(DIV_CARD);

		$card.toggleClass('card-collapsed');

		e.preventDefault();
		return false;
	  });
	  $('[data-toggle="card-fullscreen"]').on('click', function(e) {
		let $card = $(this).closest(DIV_CARD);

		$card.toggleClass('card-fullscreen').removeClass('card-collapsed');

		e.preventDefault();
		return false;
	  });
  });


