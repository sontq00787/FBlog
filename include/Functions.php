<?php
class Functions {
	public function splitStr($str, $length) {
		if (strlen ( $str ) <= $length) {
			return strip_tags($str);
		} else {
			return strip_tags(substr ( substr ( $str, 0, $length ), 0, strrpos ( substr ( $str, 0, $length ), " " ) ) ). " ...";
		}
		return "";
	}
}
?>