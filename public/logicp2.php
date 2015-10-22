<?php
# Logic.php , program created to handle the logic of the "Password Generator"
# Author: Angel Raul Pulido
# September 2015  

	$newPassword=''; #initialize variable
	$lenghtNewPassword=strlen($newPassword); # get the length of the password, start with zero.
	# verifies if the event "POST" happened.
	if($_SERVER['REQUEST_METHOD']=='POST') {
		// check if each variable has values, if not assign some values to avoid errors.
		if(isset($_POST['minWords'])){
			$wordNum= $_POST['minWords'];
		} else {
			$wordNum= 4;
		}
		if(isset($_POST['separator'])){
			$separatorSel=$_POST['separator'];
             if($separatorSel=='space')
            {
                $separatorSel=' ';
            }
		} else {
			$separatorSel='';
		}
        if(isset($_POST['ckFirstLetterUppercase'])){
			$firstLetterUpper=$_POST['ckFirstLetterUppercase'];
		} else {
			$firstLetterUpper=0;
		}
		if(isset($_POST['ckAddNumber'])){
			$addNumber=$_POST['ckAddNumber'];
		} else {
			$addNumber=0;
		}
		if(isset($_POST['ckSpecialChar'])){
			$specialChar=$_POST['ckSpecialChar'];
		} else {
			$specialChar=0;
		}
		$newPassword=password_generator($wordNum,$separatorSel,$firstLetterUpper,$addNumber,$specialChar);
		$lenghtNewPassword=strlen($newPassword);
		
	
	}
	# I created a function that generate the password, 
	# This function receive all the paramenters to be evaluate to create a new password.		
	function password_generator($wordNum,$separatorSel,$firstLetterUpper,$addNumber,$specialChar) {
		// I created a file name "wordsList.txt" that containes all words (almost 3,000 words)
		// I selected the words from the website http://www.paulnoll.com/Books/Clear-English/English-3000-common-words.html.
		$words = file('data/wordsList.txt', FILE_IGNORE_NEW_LINES);  // Read entire filel into an array $words
		$length = count($words); // obtain the total words in the array.
		$newPassword = '';       // initialize the variable that will containe the new password.
		  
		// Loop to get the randon word. 
		// The system use the wordNum variable select by the user in "Minimum Words" combo box to control the loop. 
		for ($i = 1; $i <= $wordNum; $i++) {
			$controlWhile = FALSE; // initialize the variable to control the while loop.
			while (!$controlWhile) {
				// Get random word from $words
				$key = mt_rand(0, $length);
				if ((preg_match("/^[a-z]+$/", $words[$key]) == 1) && (strlen($words[$key]) < 9)) {
					// String only contains a to z characters
					$controlWhile = TRUE;
					$selectedWord=$words[$key];
					//Check if the user select the option ""First Letter Uppercase" in order to add this functionality
					if ($firstLetterUpper==1) { 
					$selectedWord=ucwords($selectedWord); //Capitalize the first Letter
					}
					// Check if the newPassword is empty to start adding words, this is important to avoid add a separator 
					// at the first of the password.
					if($newPassword=='') {
						$newPassword = $newPassword .$selectedWord;
					} else {
					$newPassword = $newPassword .$separatorSel .$selectedWord; // add the separator.
					}
				}
			}
		}
		// Check if the user select the option ""Add Randon number",
		// if yes then select a randon number and add at the end of the new password.
		if($addNumber==1) {
			$selNum = str_split('123456789');
			$randNum='';
			foreach(array_rand($selNum ,2) as $k) $randNum.=$selNum [$k];
			$newPassword=$newPassword.$randNum;
		}
		// Check if the user select the option ""Add Randon special characters",
		// if yes then select a randon special characters  and add at the end of the new password.
		if($specialChar==1) {
			$seed = str_split('!@#$%^&*()');
			$rand='';
			foreach(array_rand($seed,2) as $k) $rand.=$seed[$k];
			$newPassword=$newPassword.$rand;
		}
		return $newPassword;
	}		
?>