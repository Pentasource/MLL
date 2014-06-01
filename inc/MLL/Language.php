<?php

class Language {
	
	private $lang = '';
	
	private $ini;
	
	public function __construct($lang) {
		$this->lang = $lang;
		
		$this->load();
	}
	
	private function load() {
		
		$this->ini = parse_ini_file('lang/' . $this->lang . '.ini');
		
	}
	
	public function getString($key) {
		return $this->ini[$key];
	}
	
}
