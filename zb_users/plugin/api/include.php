<?php
include 'api.php';
RegisterPlugin("api", "ActivePlugin_api");

function ActivePlugin_api() {
	Add_Filter_Plugin('Filter_Plugin_Index_Begin', 'api_index_begin');
}

function InstallPlugin_api() {

}

function UninstallPlugin_api() {

}

function api_index_begin() {

	global $bloghost;
	// Check if is API
	$requestUri = GetVars('HTTP_HOST', 'SERVER') . GetVars('REQUEST_URI', 'SERVER') . '/';
	$removedHttpHost = preg_replace('/^http.+\/\//', '', $bloghost);
	if (false === strpos($requestUri, $removedHttpHost . 'api/')) {
		return false;
	}
	$requestMethod = strtoupper(GetVars('REQUEST_METHOD', 'SERVER'));
	$realRouteUrl = str_replace($removedHttpHost, '', $requestUri);
	API::$Route->scanRoute($requestMethod, $realRouteUrl);

}
