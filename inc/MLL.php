<?php

class MLL {

	//default language
	private $defaultLang = 'en';

	//current language
	private $lang = '';

	/**
	 * Call this function whenever you'd like to use MLL to load preferences etc.
	 */
	public static function init() {

		//checks if user has language preference
		if (isset($_COOKIE['prefLang'])) {
			$this -> lang = $_COOKIE['prefLang'];
		} else {
			$this -> lang = $this -> defaultLang;
		}

		if (!languageIsValid($this -> lang)) {
			$this -> lang = $this -> defaultLang;
		}

	}

	public static function languageIsValid($lang) {
		return (is_file('lang/' . $lang . '.ini'));
	}

	public static function setCurrentLanguage($lang) {
		$this -> lang = $lang;
	}
	
	public static function setPreferredLanguage($lang) {
		setcookie('prefLang', $lang, time()+31536000);
	}
	
	public static function getLang() {
		$lang = new Language($this->lang);
		return $lang;
	}

}
