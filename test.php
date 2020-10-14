<?php
$chars = [
    'a' => 'e',
    'o' => 'u',
    'p' => 'b',
    't' => 'd',
    's' => 'c',
    'j' => 'g',
    'm' => 'n'
];
function encrypt(String $sentence){
    $sentenceToLower = strtolower($sentence);
    $encrypted_text = "";

    for ($i = 0; $i < strlen($sentenceToLower); $i++) {
        // If we find the character in our mapping array, use the mapped character.
        // If not, let's use the original character
            $encryptedText .= array_key_exists($sentenceToLower[$i], $chars) 
            ? $chars[$sentenceToLower[$i]]
            : $sentenceToLower[$i];
    }        
}

function decrypt(String $encrypted){
    // Decrypt
    $decryptedText = '';
    for ($i = 0; $i < strlen($encrypted); $i++) {
        // Find the correct key
        $key = array_search($encrypted[$i], $chars);

        // If the character existed, use the key.
        // If not, use the original character.
        $decryptedText .= $key !== false 
            ? $key
            : $encrypted[$i];
    }
}
?>