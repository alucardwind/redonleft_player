<?php
if ( is_admin() ){
	add_action( 'admin_menu', 'redonleft_player_menu' );
	add_action( 'admin_init', 'rp_settings' );
}

function redonleft_player_menu(){
	add_options_page(
	'Redonleft Player Options', 
	'Redonleft Player', 
	'manage_options', 
	'Redonleft-Player', 
	'redonleft_player_options');
}

function rp_settings(){
	register_setting( 'redonleft_player_group', 'bilibili_num' );
	register_setting( 'redonleft_player_group', 'netease_num' );
}

function redonleft_player_options(){
	  if ( !current_user_can( 'manage_options' ) )  {
          wp_die( 'You do not have sufficient permissions to access this page.' );
     }
?>
<div class="wrap">
<h2>Redonleft专用播放器设置</h2>
<p><?php _e("下面的选项用于控制网站内默认bilibili播放器AV号和网易云音乐播放器的歌单ID，网页内需添加代码rol_player(array('type' => 'netease或者bilibili'))","Redonleft-Player")?></p>
<form method="post" action="options.php">
	<?php
	settings_fields('redonleft_player_group');
	do_settings_sections('redonleft_player_group');
	?>
	<table>
		<tr>
			<th scope="row">
				<strong><?php _e("bilibili播放AV号", "Redonleft-Player"); ?> :</strong>
			</th>
			<td>
				<input type="text" id="bilibili_num" name="bilibili_num"  value="<?php echo get_option('bilibili_num'); ?>"/>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<strong><?php _e("网易云播单号", "Redonleft-Player"); ?> :</strong>
			</th>
			<td>
				<input type="text" id="netease_num" name="netease_num"  value="<?php echo get_option('netease_num'); ?>"/>
			</td>
		</tr>
	</table>
	<?php submit_button(); ?>
</form>	
</div>
<?php }?>