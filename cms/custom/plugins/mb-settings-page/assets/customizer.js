( function( $, api, rwmb ) {
	// Add nonce to list of inputs for validation.
	var inputSelectors = 'input[name*="nonce"], ' + rwmb.inputSelectors;

	$.extend( FormSerializer.patterns, {
		validate: /^[a-z][a-z0-9_-]*(?:\[(?:\d*|[a-z0-9_-]+)\])*$/i,
		key:      /[a-z0-9_-]+|(?=\[\])/gi,
		named:    /^[a-z0-9_-]+$/i
	} );

	api.controlConstructor[ 'meta_box' ] = api.Control.extend( {
		ready: function() {
			var setting = this.setting,
				$container = $( this.container );

			function setValue() {
				var data = $container.find( inputSelectors ).mbSerializeObject();
				setting.set( JSON.stringify( data ) );
			}

			$container.on( 'change keyup input mb_change', inputSelectors, _.debounce( setValue, 200 ) );
			setValue();

			rwmb.$document.trigger( 'mb_init_editors' );
		}
	} );
} )( jQuery, wp.customize, rwmb );