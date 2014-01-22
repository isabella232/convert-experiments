<?php

class YCE_Convert_Script {

	/**
	 * Hook script method to wp_head
	 */
	public function __construct() {
		add_action( 'wp_head', array( $this, 'script' ), 10 );
	}

	/**
	 * Output the Convert script in the header
	 */
	public function script() {
		global $wp_query;

		// Check if user entered a project number
		if ( '' != Yoast_Convert_Experiments::get_project_number() ) {

			// Setup extra var string
			$extra_vars = '';

			// Add extra vars based on page type
			if ( $wp_query->is_category() ) {
				$category_name = get_the_category_by_ID( $wp_query->query_vars['cat'] );
				$category_name = str_replace( "'", "\'", $category_name );

				$extra_vars .= "var _conv_page_type='category';";
				$extra_vars .= "var _conv_product_name='{$category_name}';";
				$extra_vars .= "var _conv_category_id='{$wp_query->query_vars['cat']}';";
				$extra_vars .= "var _conv_category_name='{$category_name}';";
			} elseif ( $wp_query->is_tag() ) {
				$tag = str_replace( "'", "\'", $wp_query->query_vars['tag'] );
				$extra_vars .= "var _conv_page_type='tag';";
				$extra_vars .= "var _conv_product_name='{$tag}';";
				$extra_vars .= "var _conv_category_id='{$wp_query->query_vars['tag_id']}';";
				$extra_vars .= "var _conv_category_name='{$tag}';";
			} elseif ( $wp_query->is_home() ) {
				$extra_vars .= "var _conv_page_type='home';";
			} elseif ( is_single() || is_page() ) {
				if ( is_single() ) {
					$extra_vars .= "var _conv_page_type='post';";
				} else {
					$extra_vars .= "var _conv_page_type='page';";
				}
				$post_title = str_replace( "'", "\'", $wp_query->post->post_title );
				$extra_vars .= "var _conv_product_name='{$post_title}';";
				$the_cats = get_the_category();
				foreach ( $the_cats as $cat ) {
					$ids[]   = $cat->cat_ID;
					$names[] = str_replace( "'", "\'", $cat->cat_name );
				}
				if ( ! empty( $ids ) ) {
					$extra_vars .= "var _conv_category_id='" . implode( ';', $ids ) . "';";
				}
				if ( ! empty( $names ) ) {
					$extra_vars .= "var _conv_category_name='" . implode( ';', $names ) . "';";
				}
			}

			// Close extra var string
			if ( ! empty( $extra_vars ) && substr( $extra_vars, - strlen( ';' ) ) !== ';' ) {
				$extra_vars .= ';';
			}

			// Get project number parts
			$parts = explode( "_", Yoast_Convert_Experiments::get_project_number() );

			// Start script part
			echo "<!-- Begin Convert Experiments code-->\n";
			echo "<script type='text/javascript'>\n";

			// Ouput extra vars if there are any
			if ( '' != trim( $extra_vars ) ) {
				echo $extra_vars;
				echo "\n";
			}

			// Ouput default tags
			echo "var _conv_plugin_id = '100';\n";
			echo 'var _conv_host = (("https:" == document.location.protocol) ? "https://d9jmv9u00p0mv.cloudfront.net" : "http://cdn-1.convertexperiments.com");' . "\n";
			echo 'document.write(unescape("%3Cscript src=\'" + _conv_host + "/js/' . $parts[0] . '-' . $parts[1] . '.js\' type=\'text/javascript\'%3E%3C/script%3E"));' . "\n";

			// Close script part
			echo "</script>\n";
			echo "<!-- End Convert	Experiments code -->\n";
		}

	}

}