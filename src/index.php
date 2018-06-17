<?php
/**
 * API NeteaseMusic
 * 
 * @author 小さな手は
 * @version 1.0.1
 * @link https://www.littlehands.site/
 * @link https://github.com/moeshin/API-NeteaseMusic/
 */
require '../api.php';
$api = new API();
$id = $api->get('id') and $type = $api->get('type')
	or $api->over([
		'message' => '参数错误'
	]);

require 'Meting.php';
$m = new Meting('netease');
$m->format(true);

$r = '';

switch ($type) {
	case 'list':
		$r = $m->playlist($id);
		break;
	case 'song':
		$r = $m->url($id);
		break;
	case 'lyric':
		$r = $m->lyric($id);
		break;
}

$api->out($r);
?>