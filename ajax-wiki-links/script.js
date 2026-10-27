// wiki script.js
// файл был пустой, добавила:

jQuery(function ($) {

	function highlightTags() {
        var tags = (new URLSearchParams(location.search).get('tags') || '').split(',');
        $('.search-tags-cloud a').each(function () {
            var text = $(this).text().trim();
            $(this).toggleClass('searchpressed', tags.indexOf(text) !== -1);
        });
    }

    $(document).on('click', 'a[onclick*="insertToNode"]', function () {
        $('html').addClass('ajax-lock');
        $(this).addClass('ajax-link-active');
    });

    BX.addCustomEvent('onAjaxSuccessFinish', function () {
        $('html').removeClass('ajax-lock');
		highlightTags();
    });

    BX.addCustomEvent('onAjaxFailure', function () {
        $('html').removeClass('ajax-lock');
        $('.ajax-link-active').removeClass('ajax-link-active');
    });

    highlightTags();     



	// клик по ссылке на удаление
	document.addEventListener('click', function (e) {
    	var link = e.target.closest('.search-tags-cloud a.searchpressed');
    	if (!link) return;

    	e.preventDefault();   
    	e.stopPropagation();  

    	var text   = $(link).text().trim();
  		var params = new URLSearchParams(location.search);
    	var rest   = (params.get('tags') || '').split(',').filter(function (t) {
        	return t && t !== text;
    	});

    	if (rest.length) {
        	params.set('tags', rest.join(','));
    	} else {
        	params.delete('tags');
    	}

    	var qs = params.toString();
    	history.pushState(null, '', location.pathname + (qs ? '?' + qs : ''));

    	var container = $('.search-tags-cloud').closest('[id^="comp_"]');
    	var id  = container.attr('id').replace('comp_', '');
    	var url = location.pathname + location.search + (location.search ? '&' : '?') + 'bxajaxid=' + id;

    	$('html').addClass('ajax-lock');
    	container.load(url, function () {
        	$('html').removeClass('ajax-lock');
        	highlightTags();
    	});
	}, true); 


	// браузерные стрелки 
	$(window).on('popstate', function () {
    	var container = $('.search-tags-cloud').closest('[id^="comp_"]');
    	if (!container.length) return;

    	var id  = container.attr('id').replace('comp_', '');
    	var url = location.pathname + location.search + (location.search ? '&' : '?') + 'bxajaxid=' + id;


    	$('html').addClass('ajax-lock');
		container.load(url, function () {
        	$('html').removeClass('ajax-lock');
        	highlightTags();
    	});
	});

}); 