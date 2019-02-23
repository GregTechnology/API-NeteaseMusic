<?php
/**
 * API NeteaseMusic
 * 
 * @author 小さな手は
 * @version 1.0.1
 * @link https://www.littlehands.site/
 * @link https://github.com/moeshin/API-NeteaseMusic/
 */
require './src/api.php';
$api = new API();
$id = $api->get('id') and $type = $api->get('type')
	or $api->over([
		'ok' => false,
		'data' => '参数错误'
	]);

require './src/Meting.php';
$m = new Meting('netease');
$m->format(true);

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

	default:
		$api->out(json_encode(array(
			'ok' => false,
			'data' => 'invalid type'
		)));
		exit;
		break;
}

$api->out(json_encode(array(
	'ok' => true,
	'data' => json_decode($r)
),JSON_UNESCAPED_SLASHES));
