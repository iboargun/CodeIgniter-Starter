/**
 * jquery.xmas.js v1.0.0
 * http://www.kolibo.de
 *
 * Copyright 2012, kolibo neue medien
 * http://www.kolibo.de
 */

;( function( $, window, undefined ) {
	
	'use strict';

	// global vars
	var $window = $( window ),
		Modernizr = window.Modernizr

	$.XMas = function( options, element ) {
		
		this.$el = $( element );
		this._cachedForm = false;
		this._init( options );
		
	};

	// the options
	$.XMas.defaults = {



	};

	$.XMas.prototype = {

		// init method
		_init : function( options ) {

			// options
			this.options = $.extend( true, {}, $.XMas.defaults, options );

			// suport for css 3d transforms and css transitions
			this.support = Modernizr.csstransitions && Modernizr.csstransforms3d;

			// cache some content values:
			// product info content
			this.$iInfo = this.$el.find( '.uc-product-infos' );
			this.iInfo = this.$iInfo.html();

			// form element
			this.$iForm = this.$el.find( '.uc-product-order' );

			// init events
			this._initEvents();
		},

		// method for initial events
		_initEvents : function(){
			var self = this;

			// append loader
			this._appendLoading();

			// assign click listener to open form button
			this.$openFormBtn = this.$iInfo.find('a.open-form');
			this.$openFormBtn.on('click', function(event){
    			event.preventDefault();

    			// check href for ajax parameter and set it
    			var href = $(this).attr("href");
				href += href.indexOf('?') == -1 ? '?ajax=1' : '&ajax=1';

				// open form
    			self.openForm(href);
    		});
		},
		
		// method to append loading
		_appendLoading	: function(){
			this.$el.append('<span class="loader" />');
			this.$loader = this.$el.find('.loader');
		},

		// method for hiding elements
		_hide		: function(el){
			$(el).css({opacity: '0', visibility: 'hidden'})
		},

		// method for showing elements
		_show		: function(el){
			$(el).css({opacity: '1', visibility: 'visible'})
		},

		// method to shos and hide loader
		showLoader: function(isLoading){
			if (isLoading) this.$loader.css({opacity: '1', visibility: 'visible'});
			else this.$loader.css({opacity: '0', visibility: 'hidden'});
		},

		// method to rebind form listeners
		_updateForm : function(){
			// bind close btn
			this._bindCloseBtn();

			// bind popover
			this._bindQuestionPopover();

			// assign form 
			this.$form = this.$iForm.find('form');

			// bind submit button
			this._bindFormSubmission();
		},

		// method to bind close btn listener
		_bindCloseBtn	: function(){
			var self = this;

			// add listener for close-btn
			this.$iForm.find('a.close-btn').on('click', function(event){
				event.preventDefault();

				// close form
				self.closeForm(false);
			});
		},
		// method to bind submit btn listener
		_bindFormSubmission	: function(){
			var self = this;

			// add listener for close-btn
			this.$form.submit(function(){
				
				// close form
				self.sendForm();

				return false;
			});
		},

		// method to bind close btn listener
		_bindQuestionPopover	: function(){

			var self = this;

			// add popover listener
		    this.$iForm.find('.entypo-question').popover();
		},

		// method to open form
		openForm	: function(href){
			var self = this;

			// check if request is cached already
			if(!self._cachedForm){

				// show loader for ajax request
				this.showLoader(true);

				this.$iForm.load(href, function(response, status, xhr) {
					self._cachedForm = response;
					
					// hide loader if request is successfull
					self.showLoader(false);

					// update form
					self._updateForm();
				});
			}

			// hide product-info
			this._hide(this.$iInfo);

			// show product form
			this._show(this.$iForm);
		},

		// method to close form
		closeForm	: function(flushcache){

			if(flushcache){
				// reset cached form
				this._cachedForm = false;
			}

			// hide loader if visible for some reason
			this.showLoader(false);

			// show product infi
			this._show(this.$iInfo);

			// show product form
			this._hide(this.$iForm);
		},

		// method to send form
		sendForm	: function(){	

			var self = this;
			
			var request = $.ajax({
								type: "POST",
	  							url: self.$form.attr("action"),
	  							data: self.$form.serialize(),
	  							success: function(data) {
	    							
	    							if(data == "REDIRECT"){
	    								$(location).attr('href', 'http://xmas.kolibo.de');
	    							}else{
	    								// load new content
		    							self.$iForm.html(data);
		    							
		    							// update form
										self._updateForm();
	    							}
	  							}
  							});
		}
	};

	var logError = function( message ) {
		if ( window.console ) {
			window.console.error( message );
		}
	};

	$.fn.xmas = function( options ) {

		var instance = $.data( this, 'xmas' );
		
		if ( typeof options === 'string' ) {
			
			var args = Array.prototype.slice.call( arguments, 1 );
			
			this.each(function() {
			
				if ( !instance ) {

					logError( "cannot call methods on xmas prior to initialization; " +
					"attempted to call method '" + options + "'" );
					return;
				
				}
				
				if ( !$.isFunction( instance[options] ) || options.charAt(0) === "_" ) {

					logError( "no such method '" + options + "' for xmas instance" );
					return;
				
				}
				
				instance[ options ].apply( instance, args );
			
			});
		
		} 
		else {
		
			this.each(function() {
				
				if ( instance ) {

					instance._init();
				
				}
				else {

					instance = $.data( this, 'xmas', new $.XMas( options, this ) );
				
				}

			});
		
		}
		
		return instance;
		
	};

} )( jQuery, window );