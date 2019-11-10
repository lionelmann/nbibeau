<?php
namespace MBSP;

class SettingsPage {
	private $args;
	public $page_hook;

	public function __construct( $args = [] ) {
		$this->args = $args;
		$this->register_hooks();
	}

	protected function register_hooks() {
		add_action( 'admin_menu', array( $this, 'register_admin_menu' ) );
	}

	public function register_admin_menu() {
		// Add top level menu.
		if ( ! $this->parent ) {
			$this->page_hook = add_menu_page(
				$this->page_title,
				$this->menu_title,
				$this->capability,
				$this->id,
				array( $this, 'show' ),
				$this->icon_url,
				$this->position
			);

			// If this menu has a default sub-menu.
			if ( $this->submenu_title ) {
				add_submenu_page(
					$this->id,
					$this->page_title,
					$this->submenu_title,
					$this->capability,
					$this->id,
					array( $this, 'show' )
				);
			}
		} // Add sub-menu.
		else {
			$this->page_hook = add_submenu_page(
				$this->parent,
				$this->page_title,
				$this->menu_title,
				$this->capability,
				$this->id,
				array( $this, 'show' )
			);
		}

		// Enqueue scripts and styles.
		add_action( "admin_print_styles-{$this->page_hook}", array( $this, 'enqueue' ) );

		// Load action.
		add_action( "load-{$this->page_hook}", array( $this, 'load' ) );
		add_action( "load-{$this->page_hook}", array( $this, 'add_help_tabs' ) );
		add_action( "load-{$this->page_hook}", array( $this, 'add_admin_notice_hook' ) );
	}

	public function show() {
		$class      = trim( "wrap {$this->class}" );
		$form_class = 'boxes' === $this->style ? '' : "rwmb-settings-{$this->style}";
		?>
		<div class="<?php echo esc_attr( $class ) ?>">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

			<?php if ( $this->tabs ) : ?>
				<h2 class="nav-tab-wrapper">
					<?php foreach ( $this->tabs as $id => $title ) : ?>
						<a href="#<?php echo 'tab-', esc_attr( $id ); ?>" class="nav-tab"><?php echo esc_html( $title ); ?></a>
					<?php endforeach; ?>
				</h2>
			<?php endif; ?>

			<form method="post" action="" enctype="multipart/form-data" id="post"<?php echo $form_class ? ' class="' . esc_html( $form_class ) . '"' : ''; ?>>
				<div id="poststuff">
					<?php
					// Nonce for saving meta boxes status (collapsed/expanded) and order.
					wp_nonce_field( 'closedpostboxes', 'closedpostboxesnonce', false );
					wp_nonce_field( 'meta-box-order', 'meta-box-order-nonce', false );
					?>
					<div id="post-body" class="metabox-holder columns-<?php echo intval( $this->columns ); ?>">
						<?php if ( $this->columns > 1 ) : ?>
							<div id="postbox-container-1" class="postbox-container">
								<?php do_meta_boxes( null, 'side', null ); ?>
							</div>
						<?php endif; ?>
						<div id="postbox-container-2" class="postbox-container">
							<?php do_meta_boxes( null, 'normal', null ); ?>
							<?php do_meta_boxes( null, 'advanced', null ); ?>
						</div>
					</div>
					<br class="clear">
					<p class="submit">
						<?php submit_button( esc_html( $this->submit_button ), 'primary', 'submit', false ); ?>
						<?php do_action( 'mb_settings_page_submit_buttons' ); ?>
					</p>
				</div>
			</form>
		</div>
		<?php
	}

	public function enqueue() {
		wp_enqueue_style( 'mb-settings-page', MBSP_URL . 'assets/settings.css', '', '1.3' );

		// For meta boxes.
		wp_enqueue_script( 'common' );
		wp_enqueue_script( 'wp-lists' );
		wp_enqueue_script( 'postbox' );

		// Enqueue settings page script and style.
		wp_enqueue_script( 'mb-settings-page', MBSP_URL . 'assets/settings.js', array( 'jquery' ), '1.1.2', true );
		wp_localize_script( 'mb-settings-page', 'MBSettingsPage', array(
			'pageHook' => $this->page_hook,
			'tabs'     => array_keys( $this->tabs ),
		) );
	}

	public function load() {
		/**
		 * Custom hook runs when current page loads. Use this to add meta boxes and filters.
		 *
		 * @param array $page_args The page arguments
		 */
		do_action( 'mb_settings_page_load', $this->args );
	}

	public function add_admin_notice_hook() {
		if ( ! $this->parent || 'options-general.php' !== $this->parent ) {
			add_action( 'admin_notices', 'settings_errors' );
		}
	}

	public function add_help_tabs() {
		if ( ! $this->help_tabs || ! is_array( $this->help_tabs ) ) {
			return;
		}
		$screen = get_current_screen();
		foreach ( $this->help_tabs as $k => $help_tab ) {
			// Auto generate help tab ID if missed.
			if ( empty( $help_tab['id'] ) ) {
				$help_tab['id'] = "{$this->id}-help-tab-$k";
			}
			$screen->add_help_tab( $help_tab );
		}
	}

	public function __get( $name ) {
		return isset( $this->args[ $name ] ) ? $this->args[ $name ] : null;
	}
}
