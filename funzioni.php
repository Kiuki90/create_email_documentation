<?php
//
// KIUKI PWD GENERATOR
// VERSION 4.0
// NEIKOS
//
// function pw_generator() {
//	$alphabet = "ABCDEFGHJKLMNOPQRSTUVWYZabcdefg!?:-_0123456789";
//	$ret = $alphabet[mt_rand(0, 23)] . $alphabet[mt_rand(24, 30)] . $alphabet[mt_rand(0, 23)] . $alphabet[mt_rand(24, 30)]
//	 . $alphabet[mt_rand(0, 23)] . $alphabet[mt_rand(31, 35)] . $alphabet[mt_rand(36, 45)] . $alphabet[mt_rand(36, 45)];
//
//	$somma = ord($ret[1]) + ord($ret[3]) - 192;
//  	$ret .= str_pad($somma, 2, "0", STR_PAD_LEFT) . $alphabet[mt_rand(36, 45)] . $alphabet[mt_rand(31, 35)];
//
//   	 return $ret;
// }
//
// function after ($this, $inthat)
//    {
//      if (!is_bool(strpos($inthat, $this)))
//      return substr($inthat, strpos($inthat,$this)+strlen($this));
// }

// KIUKI PWD GENERATOR
// VERSION 5.0 (2020)
// NEIKOS

function pw_generator() {
        $alphabet = "ABCDEFGHJKLMNOPQRSTUVWYZabcdefg!?:-=0123456789";
        $ret = $alphabet[mt_rand(0, 23)] . $alphabet[mt_rand(24, 30)] . $alphabet[mt_rand(0, 23)] . $alphabet[mt_rand(24, 30)]
         . $alphabet[mt_rand(0, 23)] . $alphabet[mt_rand(31, 35)]
         . $alphabet[mt_rand(36, 45)] . $alphabet[mt_rand(36, 45)] . $alphabet[mt_rand(36, 45)];

        $somma = ord($ret[1]) + ord($ret[3]) - 192;
        $ret .= str_pad($somma, 2, "0", STR_PAD_LEFT) . $alphabet[mt_rand(36, 45)] . $alphabet[mt_rand(31, 35)];

         return $ret;
}

// funzione per ricavare il dominio dall'email completa.
function after ($this, $inthat)
    {
      if (!is_bool(strpos($inthat, $this)))
      return substr($inthat, strpos($inthat,$this)+strlen($this));
}

