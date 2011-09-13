/*
Copyright (c) 2010-2011 MobilizeToday.com, Mobile Web Solutions Inc.

Support: http://www.mobilizetoday.com/wordpress-themes/mobius/

This file is part of the Mobius WordPress Theme.
*/
jQuery.noConflict();

var obj = null;
var timeout = 500;
function hideMenu() {
	if (obj) {
		obj.find('ul').hide();
		obj.find('ul').css("visibility","hidden");
		obj = null;
		}
	}

function showMenu() {
	if (obj) {
		obj.find('ul').show();
		obj.find('ul').css("visibility","visible");
		obj = null;
		}
	}

function initSearchLabel() 
{
	var _v = [];
	var _i = document.getElementById("search-box").getElementsByTagName('input');
	
	if (_i) 
	{
		for (var i=0; i<_i.length; i++) 
		{
			if (_i[i].type == 'text') 
			{
				_i[i].index = i;
				_v[i] = _i[i].value;
				
				_i[i].onfocus = function()
				{
					if (this.value == _v[this.index])
						this.value = '';
				}
				_i[i].onblur = function()
				{
					if (this.value == '')
						this.value = _v[this.index];
				}
			}
		}
	}
}

jQuery(document).ready(function(){

	//init search form
	initSearchLabel();

	jQuery('#content select').sSelect();
	jQuery(':checkbox').checkbox( {empty: path + '/wp-content/themes/mobius/images/empty.png', cls:'jquery-checkbox'});
	jQuery(':radio').checkbox( {empty: path + '/wp-content/themes/mobius/images/empty.png', cls:'jquery-radio'});

	jQuery('#icons a').hover(function(){
		jQuery(this).animate({
			marginTop: "-5px",
			paddingBottom: "5px"
		}, 250);

	}, function(){
		jQuery(this).animate({
			marginTop: "0px",
			paddingBottom: "0"
		}, 250);
	});
	
	
	jQuery('#menu ul li ul').hide();
	// apply bgiframe if available to fix IE6 Select Overlap Bug
	if (jQuery.fn.bgiframe){
		jQuery('#menu ul li ul').bgiframe();
	}
	jQuery('#menu ul > li').hover(function() {
		hideMenu();
		obj = jQuery(this);
		showMenu();
	}, function() {
		obj = jQuery(this);
		setTimeout("hideMenu()",timeout);
	});
	
	jQuery('a.show-search').click( function() {
		jQuery('#search-box').toggle("slow");
	});
	
	
    // Slide effect
   jQuery('.slide-block a.open-close').click(function(){
		jQuery(this).parent().next("div.block").slideToggle("fast");
		return false;
    });
	jQuery('.slide-block a.open-close').toggle( function() {
		jQuery(this).parents("div.slide-block").removeClass('inactive');
		jQuery(this).parents("div.slide-block").addClass('active');
	}, function() {
		jQuery(this).parents("div.slide-block").removeClass('active');
		jQuery(this).parents("div.slide-block").addClass('inactive');
	});


});