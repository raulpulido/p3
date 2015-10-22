<?php namespace App\Helpers;
/**
 * This class containes the routines using in the differents process of all tools
 */
use joshtronic;
use fzaninotto\faker;

class Helper
{
    /**
    * generatelorim function evaluate the conditions selected by the user and generate the text.
    * 
    */
    public static function generatelorim($howMany, $generate,$ckArticle ,$ckItalic ,$ckBold)
    {
        $lipsum = new joshtronic\LoremIpsum();
        if ($generate=='Words')
        {
            if ($ckArticle==1 && $ckItalic==1 && $ckBold==1)
            {
                $result1= $lipsum->words($howMany, ['article', 'p','i','b']);
            }
            if ($ckArticle==1 && $ckItalic==1 && $ckBold==0)
            {
                $result1= $lipsum->words($howMany, ['article', 'p','i']);
            }
            if ($ckArticle==1 && $ckItalic==0 && $ckBold==0)
            {
                $result1= $lipsum->words($howMany, ['article', 'p']);
            }
             if ($ckArticle==0 && $ckItalic==1 && $ckBold==1)
            {
                $result1= $lipsum->words($howMany, ['i','b']);
            }
            if ($ckArticle==0 && $ckItalic==1 && $ckBold==0)
            {
                $result1= $lipsum->words($howMany, ['i']);
            }
            if ($ckArticle==0 && $ckItalic==0 && $ckBold==1)
            {
                $result1= $lipsum->words($howMany, ['b']);
            }
             if ($ckArticle==0 && $ckItalic==0 && $ckBold==0)
            {
                $result1= $lipsum->words($howMany);
            }
        }
        elseif ($generate=='Sentences') 
        {
            if ($ckArticle==1 && $ckItalic==1 && $ckBold==1)
            {
                $result1= $lipsum->sentences($howMany, ['article', 'p','i','b']);
            }
            if ($ckArticle==1 && $ckItalic==1 && $ckBold==0)
            {
                $result1= $lipsum->sentences($howMany, ['article', 'p','i']);
            }
            if ($ckArticle==1 && $ckItalic==0 && $ckBold==0)
            {
                $result1= $lipsum->sentences($howMany, ['article', 'p']);
            }
             if ($ckArticle==0 && $ckItalic==1 && $ckBold==1)
            {
                $result1= $lipsum->sentences($howMany, ['i','b']);
            }
            if ($ckArticle==0 && $ckItalic==1 && $ckBold==0)
            {
                $result1= $lipsum->sentences($howMany, ['i']);
            }
            if ($ckArticle==0 && $ckItalic==0 && $ckBold==1)
            {
                $result1= $lipsum->sentences($howMany, ['b']);
            }
            if ($ckArticle==0 && $ckItalic==0 && $ckBold==0)
            {
                $result1= $lipsum->sentences($howMany);
            }
        }
        elseif ($generate=='Paragraphs')
        {
            if ($ckArticle==1 && $ckItalic==1 && $ckBold==1)
            {
                $result1= $lipsum->paragraphs($howMany, ['article', 'p','i','b']);
            }
            if ($ckArticle==1 && $ckItalic==1 && $ckBold==0)
            {
                $result1= $lipsum->paragraphs($howMany, ['article', 'p','i']);
            }
            if ($ckArticle==1 && $ckItalic==0 && $ckBold==0)
            {
                $result1= $lipsum->paragraphs($howMany, ['article', 'p']);
            }
             if ($ckArticle==0 && $ckItalic==1 && $ckBold==1)
            {
                $result1= $lipsum->paragraphs($howMany, ['i','b']);
            }
            if ($ckArticle==0 && $ckItalic==1 && $ckBold==0)
            {
                $result1= $lipsum->paragraphs($howMany, ['i']);
            }
            if ($ckArticle==0 && $ckItalic==0 && $ckBold==1)
            {
                $result1= $lipsum->paragraphs($howMany, ['b']);
            }
            if ($ckArticle==0 && $ckItalic==0 && $ckBold==0)
            {
                $result1= $lipsum->paragraphs($howMany);
            }
        }
        else
        {
            $result1= $lipsum->words($howMany, '<li><a href="$1">$1</a></li>');
        }
        return $result1;
    }
    public static function generateuser($howMany)
    {
        $json = json_decode(file_get_contents("http://api.randomuser.me/?results=".$howMany), true);
        return $json;
    }
    
    # I created a function that generate the password, 
	# This function receive all the paramenters to be evaluate to create a new password.		
	public static function password_generator($wordNum,$separatorSel,$firstLetterUpper,$addNumber,$specialChar) 
    {
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
 }