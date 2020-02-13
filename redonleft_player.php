<?php
/*
  Plugin Name: Redonleft Player
  Plugin URI: https://www.redonleft.com
  Description: only for redonleft.com, display video or audieo player on page
  Version: 1.0.0
  Author: Redonleft
  Author URI: https://www.redonleft.com

  Copyright 2019  Redonleft  (email : 844614585@qq.com)

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

include 'rp_options.php';
class redonleft_player{
	public function rol_player( $player_arr = '' ) {
		if($player_arr['type'] == "bilibili"){
			$player_before = "<iframe id='bilibili' src='https://player.bilibili.com/player.html?aid=";
			$player_after = "&cid=&page=1' scrolling='no' border='0' frameborder='no' framespacing='0' allowfullscreen='true'> </iframe>";
			if($_GET['bili_av']){
				$player_num = $_GET['bili_av'];
			}
			else{
				$player_num = get_option('bilibili_num');
			}
		}
		if($player_arr['type'] == "netease"){
			$player_before = "<meting-js list-folded='true' fixed='true' server='netease' type='playlist' id='";
			$player_after = "'></meting-js>";
			if($_GET['ap_num']){
				$player_num = $_GET['ap_num'];
			}
			else{
				$player_num = get_option('netease_num');
			}
		}
		$player = $player_before.$player_num.$player_after;
		$player = apply_filters('rol_player',$player);
		echo $player;
	}
}

$redonleft_player = new redonleft_player();

if ( ! function_exists( 'rol_player' ) ) {
	function rol_player( $player_arr = '' ) {
		global $redonleft_player;
		return $redonleft_player->rol_player( $player_arr );
	}
}
?>