/*--- Use only for Custom Javascript  ---*/
"use strict";

// Window Load
$(window).on('load', function(){
	bannerHeight();  //Banner Height
	headerHeight(); //Sticky Header
});

// Window Ready
$(function($) {
	/*======== Banner Slider ========*/
	if ($("#banner").length) {
		$('.banner-slider').slick({
			dots: false,
			arrows:true,
		});
	}
	/*======== Offers Slider ========*/
	if ($(".offers").length) {
		$('.offers-slider').slick({
			dots: false,
			arrows:true,
			slidesToShow: 3,
  			slidesToScroll: 1,
			responsive: [
				{
				  breakpoint: 768,
				  settings: {
					slidesToShow: 2,
				  }
				},
				{
				  breakpoint: 480,
				  settings: {
					slidesToShow: 1,
				  }
				}
			]
		});
	}
	/*======== Brands Slider ========*/
	if ($(".brands-slider").length) {
		$('.brands-slider').slick({
			dots: false,
			arrows:true,
			slidesToShow: 5,
  			slidesToScroll: 1,
			responsive: [
			{
			  breakpoint: 1200,
			  settings: {
				slidesToShow: 4,
				infinite: true,
				dots: true
			  }
			},
			{
			  breakpoint: 992,
			  settings: {
				slidesToShow: 3,
				infinite: true,
				dots: true
			  }
			},
			{
			  breakpoint: 600,
			  settings: {
				slidesToShow: 2,
			  }
			},
			{
			  breakpoint: 480,
			  settings: {
				slidesToShow: 1,
			  }
			}
		  ]
		});
	}
	/*======== Client Slider ========*/
	if ($(".our-customers").length) {
		$('.client-slider').slick({
			dots: true,
			arrows:false,
		});
	}
	/*======== Similar Product Slider ========*/
	/*product-slider*/

	if ($(".general-slider").length) {
		$('.general-slider').slick({
			dots: false,
			arrows:true,
			slidesToShow: 4,
			slidesToScroll: 1,
			responsive: [
				{
					breakpoint: 1199,
					settings: {
						slidesToShow: 3,
						infinite: true,
						dots: true
					}
				},
				{
					breakpoint: 991,
					settings: {
						slidesToShow: 2,
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
					}
				}
			]
		});
	}



	/*similar product*/
	if ($(".similar-product-slider").length) {
		$('.similar-product-slider').slick({
			dots: false,
			arrows:true,
			slidesToShow: 3,
  			slidesToScroll: 1,
			responsive: [
			{
			  breakpoint: 1199,
			  settings: {
				slidesToShow: 3,
				infinite: true,
				dots: true
			  }
			},
			{
			  breakpoint: 991,
			  settings: {
				slidesToShow: 2,
			  }
			},
			{
			  breakpoint: 480,
			  settings: {
				slidesToShow: 1,
			  }
			}
		  ]
		});
	}
	
	/*======== Gift Slider ========*/
	if ($(".sidebar .gift-box").length) {
		$('.gift-slider').slick({
			dots: true,
			arrows:false,
		});
	}
	
	bannerHeight();  //Banner Height
	subMenuMobile(); //Mobile Menu
	headerHeight(); //Sticky Header
	rangeSlider(); // Price Range Selector
	chocoCategories(); // Show Chocolates sub Categories
    toolTip(); // Show Tooltip
	
	// CheckBox/Radio Js
	$('.label_check, .label_radio').on("click", function() {
		setupLabel();
	});
	setupLabel();
	
	// Counter JS
	if ($(".counter").length) {
		$('.counter').counterUp({
			delay: 10,
			time:1000
		});
	}
	// Search-Box
	$(".searchBox .search-boxSmall").on("click", function() {
		$(".searchBox .search-box").slideToggle();
	});
	// View Cart
	$(".cart-items .cart-icon").on("click", function() {
		$(".cart-items .cart-table").slideToggle();
	});
	
	//Copyright Year
	var currentYear = (new Date).getFullYear();
	$("#footer .copyright .year").text(currentYear);

});

// Window Resize
$(window).on('resize', function(){
	bannerHeight(); //Banner Height
	headerHeight(); //Sticky Header
});

//Fixed nav bar on top
$(window).on('scroll', function(){
	var header = $("#header");
	var HeadTopHeight = $(".top-bar").outerHeight();
	if ( $(window).width() > 767 )
	{
		if ($(".navbar").offset().top > 40) {
			header.addClass("sticky-header").css('top','-'+ HeadTopHeight + 'px');
		} else {
			header.removeClass("sticky-header").css('top',0);;
		}
	}
});

function toolTip(){
	$('[data-toggle="tooltip"]').tooltip(); 
} 

 // Show Chocolates sub Categories
function chocoCategories(){
if($(".choclate-categories").length){
	$(".choclate-categories li.has-child > a").before('<span class="expand">+</span>');
		$(".choclate-categories li a").on("click", function() {
			if($(this).next("ul.cat-list").is(":visible"))
			{
				$(this).prev(".expand").text("+");
				$(this).next("ul.cat-list").slideUp();
			}
			else
			{
				$(".choclate-categories li .expand").text("+");
				$("ul.cat-list").slideUp();
				$(this).prev(".expand").text("-");
				$(this).next("ul.cat-list").slideDown();
			}
		});
	}
}
// Price Range Selector



// Set Banner Height
function bannerHeight(){
	var winHeight=$(window).height();
	$(".banner-slider").css('height',winHeight +'px');
}

// For Mobile Menu
function subMenuMobile(){
	$(".navbar .nav li ul.dropdown-menu").before('<span class="mobile-arrow">+</span>');
	$(".navbar .nav li .mobile-arrow").on("click", function() {
		if($(this).next("ul.dropdown-menu").is(":visible"))
		{
			$(this).text("+");
			$(this).next("ul.dropdown-menu").slideUp();
		}
		else
		{
			$(".navbar .nav li .mobile-arrow").text("+");
			$("ul.dropdown-menu").slideUp();
			$(this).text("-");
			$(this).next("ul.dropdown-menu").slideDown();
		}
	});
}

// Set Sticky Header
function headerHeight(){
	var wrapper = $("#wrapper");
	var header_height = $("#header").outerHeight();
	
	wrapper.css("padding-top","0px");
	
	if($(".inner-page").length){
		if ( $(window).width() > 767 ){
			wrapper.css("padding-top", header_height + "px");
		}
		else
		{
			wrapper.css("padding-top","0px");
		}
	}
}

// Checkbox/Radio Style
function setupLabel() {
	if ($('.label_check input').length) {
		$('.label_check').each(function(){ 
			$(this).removeClass('c_on');
		});
		$('.label_check input:checked').each(function(){ 
			$(this).parent('label').addClass('c_on');
		});                
	};
	if ($('.label_radio input').length) {
		$('.label_radio').each(function(){ 
			$(this).removeClass('r_on');
		});
		$('.label_radio input:checked').each(function(){ 
			$(this).parent('label').addClass('r_on');
		});
	};
};

// Placeholder for IE
/*
$(function () {
	if(!$.support.placeholder) {

		var active = document.activeElement;
		$(':text, textarea').focus(function () {
			if ($(this).attr('placeholder') != '' && $(this).val() === $(this).attr('placeholder')) {
				$(this).val('').removeClass('hasPlaceholder');
			}
		}).blur(function () {
			if ($(this).attr('placeholder') != '' && ($(this).val() === '' || $(this).val() === $(this).attr('placeholder'))) {
				$(this).val($(this).attr('placeholder')).addClass('hasPlaceholder');
			}
		});
		$(':text, textarea').blur();
		$(active).focus();
		$('form').submit(function () {
			$(this).find('.hasPlaceholder').each(function() { $(this).val(''); });
		});
	}
});

*/