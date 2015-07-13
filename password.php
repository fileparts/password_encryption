<style>
	* {
		margin:0;
		padding:0;
	}
</style>
<form method="post">
	<input name="formPass" type="password" placeholder="Enter Password" autocomplete="off" autofocus required />
	<button type="submit">Submit</button>
</form>

<pre>
	<code>
<?php
	$input = $_POST['formPass'];

	if(strlen($input)) {
		if(!function_exists('hash_equals')) {
			function hash_equals($str1, $str2) {
				if(strlen($str1) != strlen($str2)) {
					return false;
				} else {
					$res = $str1 ^ $str2;
					$ret = 0;
					for($i = strlen($res) - 1; $i >= 0; $i--) $ret |= ord($res[$i]);
					return !$ret;
				}
			}
		};

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

		$pass = better_crypt($input);
?>
Password Input   : <?php echo $input; ?><br>
Encryption Output: <?php echo $pass; ?><br>
Encryption Length: <?php echo strlen($pass); ?><br>
Passwords Match  : <?php if(hash_equals($pass, crypt($input,$pass))) { echo "true"; } else { echo "false"; }; ?>
<?php } else { ?>
waiting on input...
	<?php }; ?>
	</code>
</pre>
