<?php

	function seo301r($url = '', $opt = array()) {
		
		if ($url == '')
			$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];


		$realurl = str_replace('www.', '', $url); // not www
		$realurl = str_replace('/?', '', $url);



		if ($opt['html']) {
			$realurl = str_replace('.html', '', $url); // not html
			$realurl = str_replace('.htm', '', $url); // not htm
		}	

		if ($realurl !== $url){
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: $realurl");
			echo '<html><head><meta http-equiv="refresh" content="0; url=http://'.$realurl.'"></head><body></body></html>';
			exit;
		}

		echo $realurl;

		return;
	}

	
	echo seo301r('', $opt = array('html'=>True));

	exit;