# redonleft_player
这是一个专用于www.redonleft.com的网页播放器，实质上是一个wordpress插件，几行简单的代码基于apply_filters()功能实现以下功能： 1、后台在“设置”页面中增加了修改默认播放内容的option，通过bilibili的av号和网易云音乐播单号变更。 2、前段网页中通过rol_player(array('type' => 'netease或者bilibili'))实现播放器插入。 目前支持bilibili播放（基于iframe）和网易云音乐播放器（基于并感谢https://github.com/metowolf/MetingJS）
