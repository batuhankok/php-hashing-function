<?php
	error_reporting(0); // Turn off all error reporting.
	
		## ENCRYPT FUNCTION
		function enroot($pass) {
			$alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$beta = 'nopqrstuvwxyzabcdefghijklmNOPQRSTUVWXYZABCDEFGHIJKLM';
			$abwords = strtr($pass, $alpha, $beta);
			   
			$gamma = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$theta = 'defghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZabcd';
			$gtwords = strtr($abwords, $gamma, $theta);
			   
			$basewords = base64_encode($gtwords);
			   
			$equal = '==';
			$star = '*';
			$eswords = strtr($basewords, $equal, $star);
			   
			$wwwords = wordwrap($eswords, 5, "-", true);
			   
			return $wwwords;
		}
		
		## DECRYPT FUNCTION
		function deroot($pass) {
			$negative = '-';
			$empty = '';
			$newords = strtr($pass, $negative, $empty);
			   
			$star = '*';
			$equal = '==';
			$sewords = strtr($newords, $star, $equal);
			
			$basewords = base64_decode($sewords);
			
			$alpha = 'defghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZabcd';
			$beta = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$abwords = strtr($basewords, $alpha, $beta);
			   
			$gamma = 'nopqrstuvwxyzabcdefghijklmNOPQRSTUVWXYZABCDEFGHIJKLM';
			$theta = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$endwords = strtr($abwords, $gamma, $theta);

			return $endwords;
		}
?>
