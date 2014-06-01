<?php

require_once 'MLL/Language.php';

class MLL {

	//default language
	//change this if you don't want English to be the default language.
	private static $defaultLang = 'en';

	//current language
	private static $lang = '';

	/**
	 * Call this function whenever you'd like to use MLL to load preferences etc.
	 */
	public static function init() {

		//checks if user has language preference
		if (isset($_COOKIE['prefLang'])) {
			self::$lang = $_COOKIE['prefLang'];
		} else {
			self::$lang = self::$defaultLang;
		}

		//checks if language is valid
		if (!self::languageIsValid(self::$lang)) {
			self::$lang = self::$defaultLang;
		}
	}

	public static function languageIsValid($lang) {
		return (is_file('inc/MLL/lang/' . self::$lang . '.ini'));
	}

	public static function setCurrentLanguage($lang) {
		self::$lang = $lang;
	}
	
	public static function setPreferredLanguage($lang) {
		setcookie('prefLang', $lang, time()+31536000);
	}
	
	public static function getLang() {
		$lang = new Language(self::$lang);
		return $lang;
	}
	
	public static function get($key) {
		return self::getLang()->getString($key);
	}

}
