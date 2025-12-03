<?php
/**
  Plugin Name: Redonleft Player
  Plugin URI: https://github.com/alucardwind/redonleft-player
  Description: 针对redonleft.com，用于视频和歌单播放器
  Version: 2.0.0
  Author: Redonleft
  Author URI: https://www.redonleft.com

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 3 of the License, or
  any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined( 'ABSPATH' ) ) exit;

define("REDONLEFT_PLAYER_SRC", plugin_dir_path(__FILE__) . 'src/');
define("REDONLEFT_PLAYER_URL", plugin_dir_url(__FILE__) . 'assets/');

require_once REDONLEFT_PLAYER_SRC . 'Options.php';
require_once REDONLEFT_PLAYER_SRC . 'OptionContent.php';
require_once REDONLEFT_PLAYER_SRC . 'PageContent.php';

if ( is_admin() ){
	add_action('plugins_loaded', function() {
		$option = RedonleftPlayer\Options::get_instance();
		$option->init();
	});
}
else{
	wp_register_script('APlayer-js', REDONLEFT_PLAYER_URL . 'js/APlayer.min.js', ['jquery'], '1.10.1', false);
	wp_register_script('Meting-js', REDONLEFT_PLAYER_URL . 'js/Meting.min.js', ['jquery'], '2.0.1', false);
	wp_enqueue_script('APlayer-js');
	wp_enqueue_script('Meting-js');
	add_action('plugins_loaded', function() {
		$player = new RedonleftPlayer\PageContent();
		$player->MakeShortCode();
	});
}


