$(function(){

	// Alert Message
    $(".alert-message").alert();

    // Confirm Modal Box
    $('.confirm').confirmModal();

    // Modal Login Box
    $('#knm-login').modal();

    // Modal Expired Box
    $('#knm-expired').modal();

    // Modal Success Box
    $('#knm-success').modal();

    // we want to pen just one product
	var opened = false;
	var pfold = false;

	$( 'div.uc-container' ).each( function( i ) {

		var $item = $( this ), direction;

		switch( i ) {
			case 0 : direction = ['right', 'bottom']; break;
			case 1 : direction = ['left', 'bottom']; break;
			case 2 : direction = ['right', 'top']; break;
			case 3 : direction = ['left', 'top']; break;
			case 4 : direction = ['right', 'bottom']; break;
			case 5 : direction = ['left', 'bottom']; break;
			case 6 : direction = ['right', 'top']; break;
			case 7 : direction = ['left', 'top']; break;
		}
		
		// Ajax Order Form
		var xmas = $item.find('.uc-product-right').xmas();

		var pfold = $item.pfold( {
			folddirection : direction,
			speed : 300,
			folds : 2,
			onEndFolding : function() { 
										xmas.closeForm(true);
										opened = false; 
									},
			onEndUnfolding: function() { 
										pfold.scrollToElement();
									},
			centered : false
		});

		$item.find( 'span.entypo-mouse' ).on( 'click', function() {

			if( !opened ) {
				opened = true;
				pfold.unfold();
			}

		});
	});

	// pfold for special product
	$('.uc-special-container').each( function( i ) {

		var $item = $( this ), direction;

		var pfold = $item.pfold( {
			folddirection : ['right'],
			speed : 300,
			folds : 1,
			onEndFolding : function() { 
										opened = false; 
									},
			onEndUnfolding: function() { 
										pfold.scrollToElement();
									},
			centered : false
		});

		$item.find( 'span.entypo-mouse' ).on( 'click', function() {

			if( !opened ) {
				opened = true;
				pfold.unfold();
			}

		});

	});

});