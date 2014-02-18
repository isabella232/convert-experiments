<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class YCE_Admin_Page {

	/**
	 * @var array
	 */
	private $options;

	/**
	 * Setup the menu page
	 */
	public function setup() {
		$sub_menu_page = add_submenu_page( 'options-general.php', __( 'Convert Experiments Configuration', 'convert-experiments' ), __( 'Convert Experiments Configuration', 'convert-experiments' ), 'manage_options', 'convert-experiments-by-yoast', array( $this, 'content' ) );

		add_action( 'admin_print_styles-' . $sub_menu_page, array( $this, 'page_scripts' ) );

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
			__( 'Convert Experiments', 'convert-experiments' ), // Title
			array( $this, 'print_section_info' ), // Callback
			'convert-experiments-by-yoast' // Page
		);

		add_settings_field(
			'project_number', // ID
			__( 'Project Number', 'convert-experiments' ), // Title
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

	public function show_error() {
		echo "<div class='error'><p><strong>" . __( 'Convert Experiments is almost ready.', 'convert-experiments' ) . "</strong> " . sprintf( __( 'Incorrect project number.', 'convert-experiments' ), "options-general.php?page=convert-experiments-by-yoast" ) . "</p></div>";
	}

	/**
	 * Print the project number field
	 */
	public function project_number_callback() {

		printf(
			'<input type="text" id="project_number" name="convert_experiments[project_number]" value="%s" />',
			isset( $this->options['project_number'] ) ? esc_attr( $this->options['project_number'] ) : ''
		);

		if ( '' != $this->options['project_number'] && ! preg_match( '/^[0-9]+\_[0-9]+$/', $this->options['project_number'] ) ) {
			echo "<p class='yce-error'>" . __( 'Incorrect project number', 'convert-experiments' ) . "</p>\n";
		}
	}

	/**
	 * Print page content
	 */
	public function content() {
		$this->options = Yoast_Convert_Experiments::get_options();
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

				<?php if ( ! isset( $this->options['project_number'] ) || '' == $this->options['project_number'] ) { ?>

					<h3><?php _e( 'Don\'t have a Convert account yet?', 'convert-experiments' ); ?></h3>

					<p><?php printf( __( 'If you don\'t have a Convert account yet, %1$screate one here%2$s!', 'convert-experiments' ), '<a href="http://www.convert.com/yoast/">', '</a>' ); ?></p>

					<p><?php _e( 'The free Yoast Convert account contains:', 'convert-experiments' ); ?></p>
					<ol>
						<li><?php _e( 'Free 5,000 tested visitors per month for 12 months', 'convert-experiments' ); ?></li>
						<li><?php _e( 'Free A/B and Split URL testing', 'convert-experiments' ); ?></li>
						<li><?php _e( 'Upgrade discounts to paid plans', 'convert-experiments' ); ?></li>
					</ol>

				<?php
				} else {

					preg_match( '/\d+_(\d+)/', $this->options['project_number'], $match );
					if ( is_array( $match ) ) {
						$project_id = $match[1];

						echo '<h3>' . __( 'Create your tests', 'convert-experiments' ) . '</h3>';
						echo '<p>' . sprintf( __( 'You can %1$screate new tests here%2$s.', 'convert-experiments' ), '<a target="_blank" href="https://app.convertexperiments.com/#/projects/' . $project_id . '/">', '</a>' ) . '</p>';
					}
				}
				?>

				<br /><br />

				<h3><?php _e( 'Yoast Advertisement', 'convert-experiments' ); ?></h3>
				<a href="https://yoast.com/hire-us/conversion-review/?utm_source=yoast-convert-config&utm_medium=banner&utm_campaign=conversion-review-banner">
					<img src="<?php echo plugin_dir_url( Yoast_Convert_Experiments::PLUGIN_FILE ) ?>assets/images/conversion-review.png" alt="Get a Conversion Review from Team Yoast" />
				</a>

			</div>

			<div class="convert-experiments-page-right">
				<a name="product-number"></a>
				<?php _e( 'Your Product Number is located on the Edit page for your project:', 'convert-experiments' ); ?><br /><br />
				<img src="<?php echo plugin_dir_url( Yoast_Convert_Experiments::PLUGIN_FILE ) ?>assets/images/product-number.png" />
			</div>

		</div>
	<?php
	}

}