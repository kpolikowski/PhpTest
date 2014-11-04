<?php

class GitPHPTest {
	private $_perPage = 28;
	private function _curl($address, $page = 1){
	
	$curl = curl_init($address."?page={$page}&per_page={$this->_perPage}");
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl,CURLOPT_HTTPHEADER, array('User-Agent: php_curl'));
	
	$response = curl_exec($curl);
	curl_close($curl);
	return $response;
}
	
	public function getRepo($owner, $name){
	$response = $this->_curl("https://api.github.com/repos/$owner/$name");		
	return json_decode($response. true);	
	}
	
	public function getRepoCommits($owner, $name, $page=1) {
		$response = $this->_curl("https://api.github.com/repos/$owner/$name/commits", $page);
		return json_decode($response, true);
	}
}

?>