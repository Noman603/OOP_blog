<?php

class Format{
	public function dateTime($date){
		return date('F j, Y, g:i a',strtotime($date));
	}

	public function textSort($text, $limit=400){
		$text = $text." ";
		$text = substr($text, 0, $limit);
		$text = $text."......";
		return $text;
	}
	public function validation($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
}

?>