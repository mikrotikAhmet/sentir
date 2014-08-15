<?php

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * @package     EGC Services Ltd
 * @version     $Id: iban.php Aug 15, 2014 ahmet
 * @copyright   Copyright (c) 2014 EGC Services Ltd .
 * @license     http://www.semiteproject.com/license/
 */
/**
 * Description of iban.php
 *
 * @author ahmet
 */
function checkIBAN($iban) {
 
  // Normalize input (remove spaces and make upcase)
  $iban = strtoupper(str_replace(' ', '', $iban));
 
  if (preg_match('/^[A-Z]{2}[0-9]{2}[A-Z0-9]{1,30}$/', $iban)) {
    $country = substr($iban, 0, 2);
    $check = intval(substr($iban, 2, 2));
    $account = substr($iban, 4);
 
    // To numeric representation
    $search = range('A','Z');
    foreach (range(10,35) as $tmp)
      $replace[]=strval($tmp);
    $numstr=str_replace($search, $replace, $account.$country.'00');
 
    // Calculate checksum
    $checksum = intval(substr($numstr, 0, 1));
    for ($pos = 1; $pos < strlen($numstr); $pos++) {
      $checksum *= 10;
      $checksum += intval(substr($numstr, $pos,1));
      $checksum %= 97;
    }
 
    return ((98-$checksum) == $check);
  } else
    return false;
}

/* Usage
 * $account = "NL20INGB0001234557";
 * 
 * if (checkIBAN($account))
  echo 'IBAN: '.wordwrap($account, 4, ' ', true)."\n";
else
  echo "No valid IBAN account number\n";
 */
