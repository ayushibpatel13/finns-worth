var page = 2;
jQuery(document).ready(function(){
	document.addEventListener( 'wpcf7mailsent', function( event ) {
		window.location.href = FINNS.thank_url ;
	}, false );

	jQuery('body').on('click', '#loadmore', function() {
		var data = {
			'action': 'load_posts_by_ajax',
			'page': page,
			'security': FINNS.security
		};
		$.post(FINNS.ajaxurl, data, function(response) {
 		    if($.trim(response) != '') {
 		     	var feedback = JSON.parse(response);
                $('.product-list.row').append(feedback.data);
                if(feedback.data == ''){
                    $('#loadmore').hide();
                    return false;
				}
                page++;
            } 
		});
	});
});