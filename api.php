<?php
/**
 * API
 *
 * @package API 
 * @author 小さな手は
 * @version 1.0.0
 * @link https://www.littlehands.site/
 */
class API {
	
	/**
	 * Callback 回调函数名
	 * 
	 * @access private
	 */
	private $fn;
	
	/**
	 * 请求类型
	 * 
	 * @access private
	 */
	private $type;
	
	/**
	 * 请求函数
	 * 
	 * @access private
	 */
	private $args;
	
	/**
	 * 构造函数
	 * 
	 */
	function __construct() {
		header('Content-type: text/json; charset=utf-8');
		header('Access-Control-Allow-Origin: *');
		$this->method = strtoupper($_SERVER['REQUEST_METHOD']);
		$this->type == 'POST'
			and $this->args = $_POST
			or $this->args = $_GET;
		$this->fn = $this->get('callback') and header("Content-type: text/javascript; charset=utf-8");
	}
	
	/**
	 * 获取参数值
	 * 
	 * @param string 参数名
	 * @return mixed 文本或数值
	 */
	public function get($s) {
		return empty($this->args[$s])?null:$this->args[$s];
	}
	
	/**
	 * 输出Json
	 * 
	 * @param mixed 数组、对象或文本
	 */
	public function out($s) {
		if (is_array($s) || is_object($s))
			$s = json_encode($s, JSON_UNESCAPED_UNICODE);
		if ($this->fn)
			echo "{$this->fn}($s);";
		else
			echo $s;
	}
	
	/**
	 * 强制结束并输出
	 * 
	 * @param mixed 数组、对象或文本
	 */
	public function over($s) {
		$this->out($s);
		die;
	}
}
?>