<?php

# (c) Nebojsa Balatov 2012
# Klasa za rad sa sesijama pod PHP-om >= 4.1.0
# Pri primeni je bitno da u php.ini stoji
# register_globals = Off

class session
{
	function __construct()
	{
		session_cache_limiter('nocache');
		session_start();
	}

	function __destruct()
	{
		session_write_close();
	}

	function clear()
	{
		session_destroy();
		$_SESSION = array();
		session_cache_limiter('nocache');
		session_start();
	}

	function status()
	{
		return(session_status());
	}

	function load_data()
	{
		return(isset($_SESSION['data']) ? $_SESSION['data'] : '');
	}

	function store_data($data)
	{
		$_SESSION['data'] = $data;
	}
}

?>