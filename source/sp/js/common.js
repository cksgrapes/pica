$(function(){
	// --------------------
	// Attention
	// --------------------
	if(!$.cookie('attention')&&location.href=='http://masirosan.net/') {
		$('body,html').css({'overflow-y':'hidden'});
		$('#attention').show();
		$('#siteIn').on('click',function(){
			$.cookie('attention', 1, { expires: 366 });
			$('#attention').fadeOut(500,function(){
				$('body,html').css({'overflow-y':'visible'});
			});
		});
	}
	// --------------------
	// Wikipedia Widget
	// --------------------
	if($('#aboutPica1').length) {
		$('#aboutPica1').WikipediaWidget('カササギ');
	}
	if($('#aboutPica2').length) {
		$('#aboutPica2').WikipediaWidget('異食症');
	}
	// --------------------
	// 文字サイズ切り替え
	// --------------------
	if($('ul.font-size-switch').length) {
		var textarea = $('div.single-text-area');
		if(!$.cookie('fontsize')==''){
			switch($.cookie('fontsize')) {
				case 'fontS' :
					textarea.css({'fontSize':13,'lineHeight':1.6});
					break;
				case 'fontM' :
					textarea.css({'fontSize':16,'lineHeight':1.9});
					break;
				case 'fontL' :
					textarea.css({'fontSize':20,'lineHeight':1.7});
					break;
				}
				$('ul.font-size-switch li').removeClass('active');
				$('ul.font-size-switch').find('#' + $.cookie('fontsize')).addClass('active');
		}
		$('ul.font-size-switch li').on('click', function(){
			var size = $(this).attr('id');
				switch(size) {
					case 'fontS' : textarea.css({'fontSize':13,'lineHeight':1.6}); break;
					case 'fontM' : textarea.css({'fontSize':16,'lineHeight':1.9}); break;
					case 'fontL' : textarea.css({'fontSize':20,'lineHeight':1.7}); break;
				}
				$('ul.font-size-switch li').removeClass('active');
				$(this).addClass('active');
				$.cookie('fontsize', size, { expires: 366 });
		});
	}
	// --------------------
	// 擬似プルダウン
	// --------------------
	if($('div.selectbox').length) {
		$('div.selectbox').each(function(){
			var self     = $(this);
			var select   = $('div.select',self);
			var pulldown = $('ul.pulldown',self);
			var data     = $('input:hidden',self);

			var select_value = $('span.text',select);

			select.on('click',function(){
				pulldown.show();
				$(this).addClass('select_focus');
				return false;
			});
			$('li',pulldown).hover(function(){
				$(this).css({'color':'#c0392b'});
			}, function(){
				$(this).css({'color':'#666'});
			}).on('click',function(){
				var value = $(this).attr('id');
				var text = $(this).text();
				select_value.text(text);
				data.val(value);
				$('li.selected',pulldown).removeClass('selected');
				$('li.select_focus').removeClass('select_focus');
				$(this).addClass('selected');
				pulldown.hide();
				return false;
			});
			$('body').click(function(){
				$('li.select_focus').removeClass('select_focus');
				$('ul.pulldown').hide();
			});
		});
	}

});

$(window).load(function () {
	// --------------------
	// jquey.tile.js
	// --------------------
	if($('div.post-list-pic').length) {
		$('a.post-list').tile(3);
	}
});
