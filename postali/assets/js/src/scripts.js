/**
 * Theme scripting
 *
 * @package Postali Parent
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";
	
	// global vars
	var navHeight = $('#mobile-nav > .menu').outerHeight();

	// opening and closing mobile nav
	function mobileNav() {
		$('#menu-icon a').on('click', function() {
			if($(this).hasClass('closed')) {
				// open
				$('#mobile-nav').animate({
					height: navHeight,
					ease: "easeout"
				}, 350);

				$(this).removeClass('closed');
				$(this).addClass('active');
				$('body').addClass('menu-open');
			} else {
				// close
				$('#mobile-nav').animate({
					height: 100,
					ease: "easeout"
				}, 350);

				$(this).addClass('closed');
				$(this).removeClass('active');
				$('body').removeClass('menu-open');
			}
		});
	}

	// Init
	function init() {
		mobileNav();
	}

	// function windowResize() {
	// 	// make sure nav height is properly set
	// 	if($(window).width() < 992) {
	// 		$('#mobile-nav').css('height', '100%');
	// 	} else {
	// 		$('#mobile-nav').css('height', '0px');
	// 	}

	// 	navHeight = $('#mobile-nav > .menu').outerHeight();
	// }

	window.onload = init;
	// window.onresize = windowResize;

});