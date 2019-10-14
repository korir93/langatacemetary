<?php
	
	require_once "../includes.php";

	Session::LogOut();

	redirectPage(route('login'));