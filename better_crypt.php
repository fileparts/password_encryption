<?php
	function better_crypt($input) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ./';
		$charactersLength = strlen($characters);
		$saltString = '';
		for ($i = 0; $i < $length; $i++) {
				$saltString .= $characters[rand(0, $charactersLength - 1)];
		};

		$salt = '$6$rounds=5000$';
		$salt .= $saltString;
		return crypt($input, $salt);
	};
?>
