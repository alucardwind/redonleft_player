<?php

namespace RedonleftPlayer;

class PageContent {
	
	public function MakeShortCode() {
		add_shortcode('redonleft_player', [$this, 'PageHtml']);
	}
	
	public function PageHtml( $player_arr = '' ) {
		if($player_arr['type'] == "bilibili"){
			$player_before = "<iframe id='bilibili' src='https://player.bilibili.com/player.html?bvid=";
			$player_after = "&cid=&page=1&autoplay=0' scrolling='no' border='0' frameborder='no' framespacing='0' allowfullscreen='true'> </iframe>";
			if(array_key_exists('bili_av', $_GET)){
				$player_num = $_GET['bili_av'];
			}
			else{
				$player_num = get_option('bilibili_num');
			}
		}
		if($player_arr['type'] == "netease"){
			$player_before = "<meting-js list-folded='true' fixed='false' server='netease' type='playlist' id='";
			$player_after = "'></meting-js>";
			if(array_key_exists('ap_num', $_GET)){
				$player_num = $_GET['ap_num'];
			}
			else{
				$player_num = get_option('netease_num');
			}
		}
		$player = $player_before.$player_num.$player_after;
		return $player;
	}
}