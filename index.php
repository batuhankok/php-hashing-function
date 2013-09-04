<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>

	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Top Secret Communications Platform</title>
	<meta name="robots" content="noindex,follow">
	<link rel="stylesheet" href="style.css"/>
	
</head>
<body>

	<?php
	## ENCRYPT FUNCTIONS
		function enrot13($sifrelenecek) {
		   $kaynak = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		   $hedef = 'nopqrstuvwxyzabcdefghijklmNOPQRSTUVWXYZABCDEFGHIJKLM';
		   $yenikelime = strtr($sifrelenecek, $kaynak, $hedef);
		   return $yenikelime;
		}
		
	## DECRYPT FUNCTIONS
		function derot13($sifrelenecek) {
		   $kaynak = 'nopqrstuvwxyzabcdefghijklmNOPQRSTUVWXYZABCDEFGHIJKLM';
		   $hedef = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		   $yenikelime = strtr($sifrelenecek, $kaynak, $hedef);
		   return $yenikelime;
		}
	?>
	
		<ul class="menu">
			<li><a href="index.php">Homepage</a></li>
			<li><a href="http://batuhan.in" target="_blank">Developer</a></li>
			<li><a href="http://batuhan.in/iletisim" target="_blank">Contact</a></li>
		</ul>
		
		
		<div class="content" style="padding:20px 0px;">
			<center><h1 style="color:#4f4f4f">Top Secret Communications Platform</h1></center>
		</div>
		
		
		<form method="post" action="">
		
			<div class="content">
				<textarea name="content" placeholder="Text here... Available languages: English (only)" class="tcontent"></textarea>
			</div>
			
			<div class="content" style="width:97%;padding:10px 1%">
			<center>
				<select name="type" class="select" id="">
					<option value="en">Encrypt</option>
					<option value="de">Decrypt</option>
				</select>
					
				<input type="text" name="mail" class="input" placeholder="Send e-mail to this address." disabled/>
				<input type="text" name="password" class="input" style="border: 1px solid #ff8484; border-left-color: #ff4f4f; border-top-color: #ff4f4f" placeholder="Your password (Required)"/>
				
				<input type="submit" class="submit" value="Okay →"/>
			</center>
			</div>
			
		</form>
		
		
		<?php
		## Encrypting, decrypting
			if(@$_POST){
	
				$type = htmlspecialchars(@$_POST["type"]);
				$content = htmlspecialchars(@$_POST["content"]);
				$formpass = htmlspecialchars(trim(@$_POST["password"]));
				
				## Valid passwords
				$passwords= array("138376", "3924", "batuhan77");
				
				## Checking password...
				if(in_array($formpass, $passwords)){
				
					## Result is shown here
					echo '<div class="content" style="height:auto">';
						if($type=="de"){ echo derot13($content); }elseif($type=="en"){ echo enrot13($content); }
					echo '</div>';
				
				}
				else {
				
					## Incorrect Password
					echo '<div class="content" style="height:auto"><center><font color="red">Incorrect Password!</font></center></div>';
				
				}
			
			}
		?>


	<div class="footer">
		<center>
		<i>All rights reserved. &copy; 2013</i>
		</center>
	</div>
	
</body>
</html>
