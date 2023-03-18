;( function( $, window, document, undefined ) {

	"use strict";

		var	pluginName = "moreTable",
			defaults = {
				perPage: 100,
				buttonText: 'Daha Fazla',
				currentPage: 1,
				form: false,
				clicked: false,
				auto: false,
				requireFirstClick: true,
				onSubmit: false,
				afterSubmit: false,
				ended: false
			};

		function Plugin ( element, options ) {
			this.element = element;
			this.settings = $.extend( {}, defaults, options );
			this._defaults = defaults;
			this._name = pluginName;
			this.init();
		}

		$.extend( Plugin.prototype, {
			init: function() {
				this.moreTable();
			},



			moreTable: function() {
				var $table = $(this.element);
				var $e = this;

				// form varsa
				if ($e.settings.form && $e.settings.form.find('input[name="p"]').length == 0) {
					$e.settings.form.append('<input type="hidden" name="p" value="'+$e.settings.currentPage+'" />');
				}
				if ($e.settings.form && $e.settings.form.find('input[name="ajax"]').length == 0) {
					$e.settings.form.append('<input type="hidden" name="ajax" value="true" />');
				}
				if ($e.settings.form && $e.settings.form.find('input[name="limit"]').length == 0) {
					$e.settings.form.append('<input type="hidden" name="limit" value="'+$e.settings.perPage+'" />');
				}

				// tbody ara
				if ($(this.element).find('> tbody').length == 0) {
					console.log('#'+$(this.element).attr("id")+' ögesinin tbody etiketi yok, moreTable çalıştırılamadı.');
					return;
				}

				// "daha fazla" etiketini ekle
				var $devam = $('<span class="devam-btn" style="display: none;" data-id="'+$(this.element).attr("id")+'"><i class="fa fa-angle-double-down"></i> '+$e.settings.buttonText+'</span>');
				$(this.element).after($devam);
				$devam = $(this.element).parent().find('.devam-btn');

				// empty notice
				var $empty = $('<div class="empty-notice p-3"><p>Sonuç bulunamadı.</p></div>');
				$(this.element).after($empty.hide());

				// kaç tane içeriği var?
				var $len = $(this.element).find('> tbody tr').length;

				// limiti aşıyor muyuz?
				if ($len >= $e.settings.perPage)
					$devam.show();


				// submitAlt
				$e.settings.form.on('submitAlt', function() {
					console.log($e.settings.ended);
					if ($e.settings.ended)
						return;
					var $url = window.location.href;
					$e.settings.clicked = true;
					block($table);
					$.ajax({
						url: window.location.href+'&ajax=true',
						type: 'POST',
						data: $e.settings.form.serialize(),
						dataType: 'json',
						success: function(json) {

							if ($e.settings.onSubmit !== false) {
								var $refreshTable = $e.settings.onSubmit(Math.ceil($e.settings.form.find('input[name="p"]').val()), json);
							} else {
								var $refreshTable = true;
							}

							unblock($table);
							if (json.status == 'success' && json.html != '') {
								$table.show();
								$empty.hide();
								if ($refreshTable)
									$table.find('> tbody').append(json.html);
								setTimeout(function() {
									$e.settings.clicked = false;
								}, 50);

								if ($('<table>'+json.html+'</table>').find('tr').length < $e.settings.perPage) {
									$devam.hide();
								} else {
									$devam.show();
								}
							} else if (json.status == 'error') {
								swal.fire(json.message, '', 'error');
							} else {
								$devam.hide();
								$e.settings.ended = true;
								if (Math.ceil($e.settings.form.find('input[name="p"]').val()) > 1) {
									swal.fire({
										title: '',
										html: 'Kayıtların sonuna geldiniz.',
										position: 'bottom-start',
										toast: true,
										showConfirmButton: false,
										timer: 20000,
										type: 'error',
										onOpen: function() {

											var zippi = new Audio('uploads/message.mp3');
											zippi.play();

										}
									});
								} else {
									$table.hide();
									$empty.show();
								}
							}

						}
					});
					return false;
				});

				// form submit
				$e.settings.form.submit(function() {
					$e.settings.form.find('input[name="p"]').val('1');
					$e.settings.ended = false;
					$table.find('> tbody').html('');
					$e.settings.form.trigger('submitAlt');
					return false;
				});

				// form getPage
				$e.settings.form.on('getPage', function() {
					$e.settings.currentPage = Math.ceil($e.settings.form.find('input[name="p"]').val());
					$e.settings.currentPage++;
					$e.settings.form.find('input[name="p"]').val($e.settings.currentPage);
					$e.settings.form.trigger('submitAlt');
				});

				// click event ekle
				$devam.on('click', function() {
					$e.settings.requireFirstClick = false;
					$e.settings.form.trigger('getPage');
				});

				// requireFirstClick

				// window scroll
				$(window).scroll(function() {
					if ($e.settings.clicked == true || $e.settings.requireFirstClick == true || $e.settings.auto == false)
						return;
					var $elementTop = $devam.offset().top;
					var $pageTop = $(window).scrollTop() + $(window).height() + 100;
					if ($pageTop > $elementTop) {
						console.log("tıklandı");
						$devam.click();
					}
				});
			},


		} );

		// A really lightweight plugin wrapper around the constructor,
		// preventing against multiple instantiations
		$.fn[ pluginName ] = function( options ) {
			return this.each( function() {
				if ( !$.data( this, "plugin_" + pluginName ) ) {
					$.data( this, "plugin_" +
						pluginName, new Plugin( this, options ) );
				}
			} );
		};

} )( jQuery, window, document );
