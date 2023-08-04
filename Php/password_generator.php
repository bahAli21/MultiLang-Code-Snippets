<?php
/**
 * Generates a random password of the specified length with a random distribution
 * of digits, special characters, and letters (uppercase and lowercase).
 *
 * @param int $length The desired length of the password.
 * @return string The randomly generated password.
 */
function generateRandomPassword($length): string {
    // Define the characters for each category
    $digits = '0123456789';
    $specialChars = '!@#$%^&*()-_=+';
    $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    // Calculate random counts for each category
    $numDigits = rand(1, $length - 3); // Ensure space for at least 3 other characters
    $numSpecialChars = rand(1, $length - 2 - $numDigits); // Ensure space for at least 2 other character
    $numLetters = $length - $numDigits - $numSpecialChars;

    // Generate strings for each category
    $randomDigits = substr(str_shuffle($digits), 0, $numDigits);
    $randomSpecialChars = substr(str_shuffle($specialChars), 0, $numSpecialChars);
    $randomLetters = substr(str_shuffle($letters), 0, $numLetters);

    // Combine the random strings and shuffle the result,
    // reassuring us that the password is well generated

    $password = str_shuffle($randomDigits . $randomSpecialChars . $randomLetters);

    return $password;
}

// Example usage to generate a password of length 15
$generatedPassword = generateRandomPassword(8);
echo $generatedPassword;
?>
