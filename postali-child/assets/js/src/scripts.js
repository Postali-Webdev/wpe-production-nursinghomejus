/**
 * Theme scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

	var width = $(document).outerWidth()

    //Hamburger animation
	$('#menu-icon').click(function() {
		$(this).toggleClass('active');
		$('#menu-main-menu').toggleClass('active');
		return false;
	});

	//Toggle mobile menu & search
	$('.toggle-nav').click(function() {
		$('#menu-main-menu').slideToggle(400);
	});
	 
	//Close navigation on anchor tap
	$('.toggle-nav.active').click(function() {	
		$('#menu-main-menu').slideUp(400);
	});	

	//Mobile menu accordion toggle for sub pages
	$('#menu-main-menu > li.menu-item-has-children, #menu-main-menu > li.menu-item-has-children > ul.sub-menu > li.menu-item-has-children').append('<div class="accordion-toggle"><span class="icon-icon-chevron-right"></span></span></div>');

	// mobile menu functionality
	if( width <= 992) {
	  $('#menu-main-menu .menu-item-has-children > a').click(function() {
		$(this).parent().find(' > ul.sub-menu').slideToggle(400);
		$(this).parent().find(' > .accordion-toggle').toggleClass('toggle-background');
		$(this).parent().find(' > .icon-icon-chevron-right').toggleClass('toggle-rotate');
	  });
	} else { //desktop menu functionality

		//lets user close tabs by clicking anywhere else on the page
		$(document).ready(function() {
			$('html').on('click', function(e) {
				var target = e.target;
				var subMenu = $('.sub-menu');
					if( $(target).closest('.mega-child-menu').length ) {
						return;
					} else {
						subMenu.css('display', '');
						if( subMenu.hasClass('focus-show') ) {
							subMenu.removeClass('focus-show');
						}
					}
			});
		});
		
		//keeps menu expanded so user can tab through sub-menu, then closes menu after user tabs away from last child
		$(document).ready(function() {
			$('.menu-item-has-children').on('focusin', function() {
				var subMenu = $(this).find('.sub-menu');
				if( $(this).hasClass('mega-child-menu')) {
					$('.mega-child-menu > .sub-menu').addClass('focus-show');
					$(this).find('.close-menu').on('focusout', function() {
						$('.mega-child-menu > .sub-menu').removeClass('focus-show');
					})
				} else {
					subMenu.css('display', 'block');
					$(this).find('.sub-menu > li:last-child').on('focusout', function(e) {
						if( $(e.currentTarget).parents().hasClass('nav-sub-title')) {
							return;
						} else {
							subMenu.css('display', 'none');
						}
					})
				}
			})
		});
		// mega menu close button
		$(document).ready(function() {
			$('.close-menu a').on('click', function(e) {
				$('.mega-child-menu > .sub-menu').addClass('hidden');
				$('.mega-child-menu > .sub-menu').removeClass('focus-show');
			});
			$('.mega-child-menu').on('mouseleave', function() {
				$('.mega-child-menu > .sub-menu').removeClass('hidden');
			});
		});
	}

    // script to make accordions function
	$(".accordions").on("click", ".accordions_title", function() {
        // will (slide) toggle the related panel.
        $(this).toggleClass("active").next().slideToggle();
    });

	// Toggle search function in nav
	$( document ).ready( function() {
		var width = $(document).outerWidth()
		if (width > 992) {
			var open = false;
			$('#search-button').attr('type', 'button');
			
			$('#search-button').on('click', function(e) {
					if ( !open ) {
						$('#search-input-container').removeClass('hdn');
						$('#search-button span').removeClass('icon-magnifying-glass').addClass('icon-close-x');
						$('#menu-main-menu li.menu-item').addClass('disable');
						$('.form-control').focus();
						open = true;
						return;
					}
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-magnifying-glass');
						$('#menu-main-menu li.menu-item').removeClass('disable');
						open = false;
						return;
					}
			}); 
			$('html').on('click', function(e) {
				var target = e.target;
				if( $(target).closest('.navbar-form-search').length ) {
					return;
				} else {
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-magnifying-glass');
						$('#menu-main-menu li.menu-item').removeClass('disable');
						open = false;
						return;
					}
				}
			});
		}
	});
	
	// custom radio button style for selection
	$(document).ready( function() {	
		$('.gform_wrapper').on('click', '.gchoice', function() {
			if( $('.gchoice.selected').length ) {
				$('.gchoice.selected').removeClass('selected');	
			}
			$(this).addClass('selected');
		})
		$('.gform_wrapper').on('click', '.gform_previous_button, .gform_next_button', function() {
			//needed the timeout to let the ajax call finish
			setTimeout(function(){
				$('.gform_wrapper').find('input[type=radio]:checked').parent().addClass('selected')
			}, 500);
		})
	});

	// highlight links function
	$(document).ready(function() {
		function highlight() {
			var scroll = $(window).scrollTop();
			var height = $(window).height();
		  
			$("p > a, .highlight > a, li > a").each(function(){
			  var pos = $(this).offset().top;
			  if (scroll+height >= pos && !$(this).hasClass('ignore-highlight')) {
				$(this).addClass("active");
			  } 
			});
		  }

		  if( width > 667 ) {
			highlight();
			$(window).on("scroll", function(){
			  highlight();
			});
		  }

	
	});

	// apply inner link to entire parent element
	$(document).ready(function() {
		$('.link-hunter').on('click', function() {
			var link = $(this).find('a').attr('href');
			window.location.href = link;
		});
	});

	// toggle practice areas
	$(document).ready(function() {
		if( $('.page-template-page-practice-areas').length ) {
			$('.category-btn').on('click', function() {
				if( $(this).hasClass('active') ) {
					return;
				} else {
					let activePa = $(this).attr('data-pa');
					$('.category-btn.active, .pa-sub-container.active').removeClass('active');
					$(this).addClass('active');
					$("#" + activePa).addClass('active');
				}
			});
		}
	});	

	// Remove active state for anchor link on About page
	$(document).ready(function() {
		if( $('.page-id-179').length ) {
			var width = $(document).outerWidth();
			function checkHash() {
				var hash = $(location).attr('hash');
				if( hash === '#mac-hester') {
					$('#menu-item-696').addClass('hide-active');
				} else {
					$('#menu-item-695').addClass('hide-active');
				}
			}
			checkHash();
			if( width < 993 ) {
				$('#menu-main-menu').on('click', '#menu-item-695', function() {
					$('#menu-icon').toggleClass('active');
					$('#menu-main-menu').toggleClass('active');
					$('#menu-main-menu').slideUp(400);
				})
			}
		}
	});
});

