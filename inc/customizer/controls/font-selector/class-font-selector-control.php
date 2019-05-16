<?php
	/**
	 * Google Font Select Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */
	class Nothing_Personal_Google_Font_Select_Custom_Control extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'google_fonts';
		/**
		 * The list of Google Fonts
		 */
		private $fontList = false;
		/**
		 * The saved font values decoded from json
		 */
		private $fontValues = [];
		/**
		 * The index of the saved font within the list of Google fonts
		 */
		private $fontListIndex = 0;
		/**
		 * The number of fonts to display from the json file. Either positive integer or 'all'. Default = 'all'
		 */
		private $fontCount = 'all';
		/**
		 * The font list sort order. Either 'alpha' or 'popular'. Default = 'alpha'
		 */
		private $fontOrderBy = 'alpha';
		/**
		 * Get our list of fonts from the json file
		 */
		public function __construct( $manager, $id, $args = array(), $options = array() ) {
			parent::__construct( $manager, $id, $args );
			// Get the font sort order
			if ( isset( $this->input_attrs['orderby'] ) && strtolower( $this->input_attrs['orderby'] ) === 'popular' ) {
				$this->fontOrderBy = 'popular';
			}
			// Get the list of Google fonts
			if ( isset( $this->input_attrs['font_count'] ) ) {
				if ( 'all' != strtolower( $this->input_attrs['font_count'] ) ) {
					$this->fontCount = ( abs( (int) $this->input_attrs['font_count'] ) > 0 ? abs( (int) $this->input_attrs['font_count'] ) : 'all' );
				}
			}
			$this->fontList = $this->skyrocket_getGoogleFonts( 'all' );
			// Decode the default json font value
			$this->fontValues = json_decode( $this->value() );
			// Find the index of our default font within our list of Google fonts
			$this->fontListIndex = $this->skyrocket_getFontIndex( $this->fontList, $this->fontValues->font );
		}
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_style( 'nothing-personal-custom-controls-css', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/controls/font-selector/font-selector.css', array(), '1.1', 'all' );
		}
		/**
		 * Export our List of Google Fonts to JavaScript
		 */
		public function to_json() {
			parent::to_json();
			$this->json['skyrocketfontslist'] = $this->fontList;
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			$fontCounter = 0;
			$isFontInList = false;
			$fontListStr = '';

			if( !empty($this->fontList) ) {
				?>
				<div class="google_fonts_select_control">
					<?php if( !empty( $this->label ) ) { ?>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php } ?>
					<?php if( !empty( $this->description ) ) { ?>
						<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
					<?php } ?>
					<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-google-font-selection" <?php $this->link(); ?> />
					<div class="google-fonts">
						<select class="google-fonts-list" control-name="<?php echo esc_attr( $this->id ); ?>">
							<?php
								foreach( $this->fontList as $key => $value ) {
									$fontCounter++;
									$fontListStr .= '<option value="' . $value->family . '" ' . selected( $this->fontValues->font, $value->family, false ) . '>' . $value->family . '</option>';
									if ( $this->fontValues->font === $value->family ) {
										$isFontInList = true;
									}
									if ( is_int( $this->fontCount ) && $fontCounter === $this->fontCount ) {
										break;
									}
								}
								if ( !$isFontInList && $this->fontListIndex ) {
									// If the default or saved font value isn't in the list of displayed fonts, add it to the top of the list as the default font
									$fontListStr = '<option value="' . $this->fontList[$this->fontListIndex]->family . '" ' . selected( $this->fontValues->font, $this->fontList[$this->fontListIndex]->family, false ) . '>' . $this->fontList[$this->fontListIndex]->family . ' (default)</option>' . $fontListStr;
								}
								// Display our list of font options
								echo $fontListStr;
							?>
						</select>
					</div>

					<input type="hidden" class="google-fonts-category" value="<?php echo $this->fontValues->category; ?>">
				</div>
                <script type="text/javascript">


                    $('.google-fonts-list').on('change', function() {
                        var elementRegularWeight = $(this).parent().parent().find('.google-fonts-regularweight-style');
                        var elementItalicWeight = $(this).parent().parent().find('.google-fonts-italicweight-style');
                        var elementBoldWeight = $(this).parent().parent().find('.google-fonts-boldweight-style');
                        var selectedFont = $(this).val();
                        var customizerControlName = $(this).attr('control-name');
                        var elementItalicWeightCount = 0;
                        var elementBoldWeightCount = 0;

                        // Clear Weight/Style dropdowns
                        elementRegularWeight.empty();
                        elementItalicWeight.empty();
                        elementBoldWeight.empty();
                        // Make sure Italic & Bold dropdowns are enabled
                        elementItalicWeight.prop('disabled', false);
                        elementBoldWeight.prop('disabled', false);

                        // Get the Google Fonts control object
                        var bodyfontcontrol = _wpCustomizeSettings.controls[customizerControlName];

                        // Find the index of the selected font
                        var indexes = $.map(bodyfontcontrol.skyrocketfontslist, function(obj, index) {
                            if(obj.family === selectedFont) {
                                return index;
                            }
                        });
                        var index = indexes[0];

                        // For the selected Google font show the available weight/style variants
                        $.each(bodyfontcontrol.skyrocketfontslist[index].variants, function(val, text) {
                            elementRegularWeight.append(
                                $('<option></option>').val(text).html(text)
                            );
                            if (text.indexOf("italic") >= 0) {
                                elementItalicWeight.append(
                                    $('<option></option>').val(text).html(text)
                                );
                                elementItalicWeightCount++;
                            } else {
                                elementBoldWeight.append(
                                    $('<option></option>').val(text).html(text)
                                );
                                elementBoldWeightCount++;
                            }
                        });

                        if(elementItalicWeightCount == 0) {
                            elementItalicWeight.append(
                                $('<option></option>').val('').html('Not Available for this font')
                            );
                            elementItalicWeight.prop('disabled', 'disabled');
                        }
                        if(elementBoldWeightCount == 0) {
                            elementBoldWeight.append(
                                $('<option></option>').val('').html('Not Available for this font')
                            );
                            elementBoldWeight.prop('disabled', 'disabled');
                        }

                        // Update the font category based on the selected font
                        $(this).parent().parent().find('.google-fonts-category').val(bodyfontcontrol.skyrocketfontslist[index].category);

                        skyrocketGetAllSelects($(this).parent().parent());
                    });

                    $('.google_fonts_select_control select').on('change', function() {
                        skyrocketGetAllSelects($(this).parent().parent());
                    });

                    function skyrocketGetAllSelects($element) {
                        var selectedFont = {
                            font: $element.find('.google-fonts-list').val(),
                            regularweight: $element.find('.google-fonts-regularweight-style').val(),
                            italicweight: $element.find('.google-fonts-italicweight-style').val(),
                            boldweight: $element.find('.google-fonts-boldweight-style').val(),
                            category: $element.find('.google-fonts-category').val()
                        };

                        // Important! Make sure to trigger change event so Customizer knows it has to save the field
                        $element.find('.customize-control-google-font-selection').val(JSON.stringify(selectedFont)).trigger('change');
                    }
                </script>
				<?php
			}
		}

		/**
		 * Find the index of the saved font in our multidimensional array of Google Fonts
		 */
		public function skyrocket_getFontIndex( $haystack, $needle ) {
			foreach( $haystack as $key => $value ) {
				if( $value->family == $needle ) {
					return $key;
				}
			}
			return false;
		}

		/**
		 * Return the list of Google Fonts from our json file. Unless otherwise specfied, list will be limited to 30 fonts.
		 */
		public function skyrocket_getGoogleFonts( $count = 30 ) {
			// Google Fonts json generated from https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&key=YOUR-API-KEY
			$fontFile = trailingslashit( get_template_directory_uri() ) . 'inc/customizer/controls/font-selector/google-fonts-alphabetical.json';
			if ( $this->fontOrderBy === 'popular' ) {
				$fontFile = trailingslashit( get_template_directory_uri() ) . 'inc/customizer/controls/font-selector/google-fonts-popularity.json';
			}

			$request = wp_remote_get( $fontFile );
			if( is_wp_error( $request ) ) {
				return "";
			}

			$body = wp_remote_retrieve_body( $request );
			$content = json_decode( $body );

			if( $count == 'all' ) {
				return $content->items;
			} else {
				return array_slice( $content->items, 0, $count );
			}
		}
	}