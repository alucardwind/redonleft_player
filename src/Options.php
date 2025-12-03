<?php
namespace RedonleftPlayer;

class Options {
	private static $instance = null;

	public static function get_instance() : self {
		if ( null === self::$instance ) self::$instance = new self();
		return self::$instance;
	}
	
	public function init() {
		add_action( 'admin_menu', [self::get_instance(),'redonleft_player_menu'] );
		add_action( 'admin_init', [self::get_instance(),'rp_settings'] );
	}

	public function redonleft_player_menu(){
		add_options_page(
			'Redonleft Player Options',
			'Redonleft Player',
			'manage_options',
			'Redonleft-Player',
			[self::get_instance(),'redonleft_player_options']);
	}

	public function rp_settings(){
		register_setting( 'redonleft_player_group', 'bilibili_num' );
		register_setting( 'redonleft_player_group', 'netease_num' );
	}

	public function redonleft_player_options(){
		$page = new \RedonleftPlayer\OptionContent();
		$page->show_page();
	}
}