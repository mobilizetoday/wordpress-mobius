/*
Copyright (c) 2010-2011 MobilizeToday.com, Mobile Web Solutions Inc.

Support: http://www.mobilizetoday.com/wordpress-themes/mobius/

This file is part of the Mobius WordPress Theme.
*/
jQuery.noConflict();

jQuery(document).ready(function(){
	// slide effect
	jQuery('.sm-slide-block a.sm-open-close').click(function(){
		jQuery(this).parent().next("div.sm-block").slideToggle("fast");

		return false;
		});
	jQuery('.sm-slide-block a.sm-open-close').toggle( function() {
		jQuery(this).parents("div.sm-slide-block").removeClass('inactive');
		jQuery(this).parents("div.sm-slide-block").addClass('active');
	}, function() {
		jQuery(this).parents("div.sm-slide-block").removeClass('active');
		jQuery(this).parents("div.sm-slide-block").addClass('inactive');
	});
	initFormLabels();
});

function initFormLabels() 
{
	var _v = [];
	var _i = document.getElementsByTagName('input');
	var _t = document.getElementsByTagName('textarea');
	
	if (_i) 
	{
		for (var i=0; i<_i.length; i++) 
		{
			if (_i[i].type == 'text') 
			{
				if (_i[i].value == '')
				{
					var _n = _i[i].parentNode;
					while (_n.tagName != 'form')
					{
						var _l = _n.getElementsByTagName('label');
						if (_l.length)
						{
							_i[i].value = _l[0].innerHTML + "...";
							break;
						}
						_n = _n.parentNode;
					}
				}
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
	if (_t) 
	{
		for (var i=0; i<_t.length; i++) 
		{
			if (_t[i].value == '')
			{
				var _n = _t[i].parentNode;
				while (_n.tagName != 'form')
				{
					var _l = _n.getElementsByTagName('label');
					if (_l.length)
					{
						_t[i].value = _l[0].innerHTML + "...";
						break;
					}
					_n = _n.parentNode;
				}
			}
			_t[i].index = i;
			_v['ta'+i] = _t[i].value;
			
			_t[i].onfocus = function()
			{
				if (this.value == _v['ta'+this.index])
					this.value = '';
			}
			_t[i].onblur = function()
			{
				if (this.value == '')
					this.value = _v['ta'+this.index];
			}
		}
	}
}