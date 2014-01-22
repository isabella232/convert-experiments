<?php

class YCE_Admin_Page {

	private $options;

	/**
	 * Setup the menu page
	 */
	public function setup() {
		$submenu_page = add_submenu_page( 'options-general.php', __( 'Convert Experiments Configuration' ), __( 'Convert Experiments Configuration' ), 'manage_options', 'convert-experiments-by-yoast', array( $this, 'content' ) );

		add_action( 'admin_print_styles-' . $submenu_page, array( $this, 'page_scripts' ) );

		add_action( 'admin_init', array( $this, 'page_init' ) );
	}

	/**
	 * Load page style and scripts
	 */
	public function page_scripts() {
		wp_enqueue_style( 'convert-experiments-admin-page', plugin_dir_url( Yoast_Convert_Experiments::PLUGIN_FILE ) . '/assets/css/convert-experiments.css' );
	}

	/**
	 * Register settings, sections and fields
	 */
	public function page_init() {
		register_setting( 'convert-experiments', 'convert_experiments', array( $this, 'sanitize' ) );

		add_settings_section(
				'section_convert_experiments', // ID
				'Convert Experiments', // Title
				array( $this, 'print_section_info' ), // Callback
				'convert-experiments-by-yoast' // Page
		);

		add_settings_field(
				'project_number', // ID
				'Project Number', // Title
				array( $this, 'project_number_callback' ), // Callback
				'convert-experiments-by-yoast', // Page
				'section_convert_experiments' // Section
		);
	}

	/**
	 * Print section info
	 */
	public function print_section_info() {
		echo __( 'Enter your project number below.', 'convert-experiments' );
	}

	/**
	 * Sanatize field
	 *
	 * @param string $input
	 *
	 * @return string
	 */
	public function sanitize( $input ) {
		return $input;
	}

	/**
	 * Print the project number field
	 */
	public function project_number_callback() {
		printf(
				'<input type="text" id="project_number" name="convert_experiments[project_number]" value="%s" />',
				isset( $this->options['project_number'] ) ? esc_attr( $this->options['project_number'] ) : ''
		);
	}

	/**
	 * Print page content
	 */
	public function content() {
		//global $convert_nonce, $wpcom_api_key;

		/*
		$messages = array();

		if ( isset( $_POST['submit'] ) ) {
			if ( function_exists( 'current_user_can' ) && ! current_user_can( 'manage_options' ) ) {
				die( __( 'Cheatin&#8217; uh?' ) );
			}

			check_admin_referer( $convert_nonce );

			$saved = false;

			$key = $_POST['key'];
			if ( empty( $key ) ) {
				$messages['new_key_empty'] = array( 'color' => 'aa0', 'text' => __( 'Your project number has been cleared.', 'convert-experiments' ) );
				delete_option( 'convert_experiments_project_number' );
				$saved = true;
			} else {
				if ( preg_match( '/^[0-9]+\_[0-9]+$/', $key ) ) {
					$messages['new_key_valid'] = array( 'color' => '4AB915', 'text' => __( 'Project number \'' . $key . '\' has been saved.', 'convert-experiments' ) );
					update_option( 'convert_experiments_project_number', $key );
					$saved = true;
				} else {
					$messages['new_key_invalid'] = array( 'color' => '888', 'text' => __( 'The project number you entered \'' . $key . '\' is invalid. Please double-check it.', 'convert-experiments' ) );
				}
			}

		} else {
			$key = get_option( 'convert_experiments_project_number' );
		}

		$pluginFolder = get_bloginfo( 'wpurl' ) . '/wp-content/plugins/' . dirname( plugin_basename( __FILE__ ) ) . '/';

		?>
		<?php if ( $saved ) { ?>
			<div id="message" class="updated fade"><p><strong><?php _e( 'Options saved.' ) ?></strong></p></div>
		<?php } ?>
		<div class="wrap">
			<h2>Yoast <?php _e( 'Convert Experiments Configuration' ); ?></h2>
			<?php if ( isset( $_GET['message'] ) && $_GET['message'] == 'success' ) { ?>
				<div class="updated below-h2" id="message">
					<p><?php _e( '<strong>Sign up success!</strong> Please check your email for your Convert Experiments API Key and enter it below.' ); ?></p>
				</div>
			<?php } ?>
			<div>
				<form action="" method="post" id="convert-conf">
					<?php if ( ! $wpcom_api_key ) { ?>
						<p><?php printf( __( '<a href="%1$s">Convert Experiments</a> will allow you to easily perform A/B or multivariate tests on your blog or website. If you don\'t have a Project Number yet, you can get one at <a href="%2$s">Convert.com</a>.' ), 'http://convert.com/', 'https://www.convertexperiments.com/login?action=register&utm_source=wordpressplugin&utm_medium=adminlink' ); ?></p>

						<h3><label for="key"><?php _e( 'Convert Experiments Project Number' ); ?></label></h3>
						<?php foreach ( $messages as $message ) { ?>
							<p style="padding: .5em; background-color: #<?php echo $message['color']; ?>; color: #fff; font-weight: bold;"><?php echo $message['text']; ?></p>
						<?php } ?>
						<p>
							<input id="key" name="key" type="text" value="<?php echo $key ?>" style="font-family: 'Courier New', Courier, mono; font-size: 1.5em;" /> (<?php _e( '<a href="#product-number">What is this?</a>' ); ?>)
						</p>
						<?php wp_nonce_field( $convert_nonce ); ?>
						<p class="submit"><input type="submit" name="submit" value="<?php _e( 'Update options &raquo;' ); ?>" /></p>
					<?php } ?>
				</form>
			</div>

			<div>
				<a name="product-number"></a>
				Your Product Number is located on the Edit page for your project:<br />
				<img src="<?php echo $pluginFolder ?>/images/product-number.png" style="border: 2px solid black" />
			</div>
		</div>
	<?php
		*/

		$this->options = get_option( 'convert_experiments' );
		?>
		<div class="wrap">
			<h2><?php echo __( 'Convert Experiments by Yoast', 'convert-experiments' ) . ' - ' . __( 'Configuration', 'convert-experiments' ); ?></h2>

			<div class="convert-experiments-page-left">
				<form method="post" action="options.php">
					<?php
					// This prints out all hidden setting fields
					settings_fields( 'convert-experiments' );
					do_settings_sections( 'convert-experiments-by-yoast' );
					submit_button();
					?>
				</form>
			</div>

			<div class="convert-experiments-page-right">
				<a name="product-number"></a>
				Your Product Number is located on the Edit page for your project:<br /><br />
				<img src="<?php echo plugins_url() ?>/convert-experiments/assets/images/product-number.png" style="border: 2px solid black" />
			</div>
		</div>
	<?php
	}

}