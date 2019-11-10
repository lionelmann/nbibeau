<?php
namespace MBSP\Customizer;

use MBSP\Factory;

class Manager {
	public function __construct() {
		// Priority 30 ensures it fires after meta boxes are registered.
		add_action( 'init', [$this, 'init'], 30 );
	}

	public function init() {
		$configs = apply_filters( 'rwmb_meta_boxes', [] );

		// Meta box that has a settings page.
		$settings_sections = array_filter( $configs, function( $config ) {
			return ! empty( $config['settings_pages'] );
		} );
		array_walk( $settings_sections, [$this, 'register_settings_section'] );

		// Meta box that doesn't have a settings page.
		$normal_sections = array_filter( $configs, function( $config ) {
			return isset( $config['panel'] );
		} );
		array_walk( $normal_sections, [$this, 'register_normal_section'] );
	}

	private function register_settings_section( $config ) {
		$meta_box = new SettingsSection( $config );
		$meta_box->register_fields();
		$panels = Factory::get( $config['settings_pages'], 'customizer' );

		foreach ( $panels as $panel ) {
			$meta_box->object_id = $panel->option_name;
			new Setting( $meta_box );
		}
	}

	private function register_normal_section( $config ) {
		$meta_box = new NormalSection( $config );
		$meta_box->register_fields();

		new Setting( $meta_box );
	}
}
