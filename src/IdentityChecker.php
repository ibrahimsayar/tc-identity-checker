<?php

namespace TCIdentityChecker;

class IdentityChecker
{
	public function check(int $identityNumber): bool
	{
		if (!is_numeric($identityNumber) || $identityNumber[0] == 0) {
	        return false;
	    }

	    $firstAllowCharacter = [1, 3, 5, 7, 9];
	    $secondAllowCharacter = [2, 4, 6, 8];
	    $thirdAllowCharacter = [1, 2, 3, 4, 5, 6, 7, 8, 9];
	    $firstSumCharacters = 0;
	    $secondSumCharacters = 0;
	    $thirdSumCharacters = 0;
	    for ($l = 0; $l < strlen($identityNumber); $l++) {
	        if (in_array(($l + 1), $firstAllowCharacter)) {
	            $firstSumCharacters += $identityNumber[$l];
	        }
	        if (in_array(($l + 1), $secondAllowCharacter)) {
	            $secondSumCharacters += $identityNumber[$l];
	        }
	        if (in_array(($l + 1), $thirdAllowCharacter)) {
	            $thirdSumCharacters += $identityNumber[$l];
	        }
	    }

	    $the10thDigitOfThe = (($firstSumCharacters * 7) - $secondSumCharacters) % 10;
	    $the11thDigitOfThe = ($thirdSumCharacters + $the10thDigitOfThe) % 10;

	    if ($identityNumber[9] != $the10thDigitOfThe && $the10thDigitOfThe != $the11thDigitOfThe) {
	        return false;
	    }

	    return true;
	}
}