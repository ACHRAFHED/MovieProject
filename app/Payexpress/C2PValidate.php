<?php
namespace Payexpress;

/**
 * Validation class
 *
 * This class serve as a validator helper for Connect2PayexpressPos class.
 *
 * @version 1.0
 * @since 2015-02-21
 * @package Connect2PayexpressPos
 * @author Mehdi Atraimche < mehdi.atraimche@vpscorp.ma >
 * @copyright VPS - VANTAGE PAYMENT SYSTEMS < http://www.vantage-card.com/ >
 */

class C2PValidate {

    /**
     * Check for e-mail validity
     *
     * @param string $email e-mail address to validate
     * @return boolean Validity is ok or not
     */
    static public function isEmail($email)
    {
        return C2PValidate::isEmpty($email) OR preg_match('/^[a-z0-9!#$%&\'*+\/=?^`{}|~_-]+[.a-z0-9!#$%&\'*+\/=?^`{}|~_-]*@[a-z0-9]+[._a-z0-9-]*\.[a-z0-9]+$/ui', $email);
    }

    /**
     * Check for IP validity
     *
     * @param string $ip IP address to validate
     * @return boolean Validity is ok or not
     */
    static public function isIP($ip)
    {
        return C2PValidate::isEmpty($ip) OR preg_match('/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/', $ip);
    }


    /**
     * Check for MD5 string validity
     *
     * @param string $md5 MD5 string to validate
     * @return boolean Validity is ok or not
     */
    static public function isMd5($md5)
    {
        return preg_match('/^[a-f0-9A-F]{32}$/', $md5);
    }

    /**
     * Check for SHA1 string validity
     *
     * @param string $sha1 SHA1 string to validate
     * @return boolean Validity is ok or not
     */
    static public function isSha1($sha1)
    {
        return preg_match('/^[a-fA-F0-9]{40}$/', $sha1);
    }

    /**
     * Check for a float number validity
     *
     * @param float $float Float number to validate
     * @return boolean Validity is ok or not
     */
    static public function isFloat($float)
    {
        return strval((float)($float)) == strval($float);
    }

    static public function isUnsignedFloat($float)
    {
        return strval((float)($float)) == strval($float) AND $float >= 0;
    }


    /**
     * Check for name validity
     *
     * @param string $name Name to validate
     * @return boolean Validity is ok or not
     */
    static public function isName($name)
    {
        return preg_match('/^[^0-9!<>,;?=+()@#"°{}_$%:]*$/', stripslashes($name));
    }

    /**
     * Check for a country name validity
     *
     * @param string $name Country name to validate
     * @return boolean Validity is ok or not
     */
    static public function isCountryName($name)
    {
        return preg_match('/^[a-zA-Z -]+$/', $name);
    }


    /**
     * Check for a postal address validity
     *
     * @param string $address Address to validate
     * @return boolean Validity is ok or not
     */
    static public function isAddress($address)
    {
        return empty($address) OR preg_match('/^[^!<>?=+@{}_$%]*$/', $address);
    }

    /**
     * Check for city name validity
     *
     * @param string $city City name to validate
     * @return boolean Validity is ok or not
     */
    static public function isCityName($city)
    {
        return preg_match('/^[^!<>;?=+@#"°{}_$%]*$/', $city);
    }

    /**
     * Check for date format
     *
     * @param string $date Date to validate
     * @return boolean Validity is ok or not
     */
    static public function isDateFormat($date)
    {
        return (bool)preg_match('/^([0-9]{4})-((0?[0-9])|(1[0-2]))-((0?[1-9])|([0-2][0-9])|(3[01]))( [0-9]{2}:[0-9]{2}:[0-9]{2})?$/', $date);
    }

    /**
     * Check for date validity
     *
     * @param string $date Date to validate
     * @return boolean Validity is ok or not
     */
    static public function isDate($date)
    {
        if (!preg_match('/^([0-9]{4})-((0?[1-9])|(1[0-2]))-((0?[1-9])|([1-2][0-9])|(3[01]))( [0-9]{2}:[0-9]{2}:[0-9]{2})?$/', $date, $matches))
            return false;
        return checkdate((int)$matches[2], (int)$matches[5], (int)$matches[0]);
    }


    /**
     * Check for boolean validity
     *
     * @param boolean $bool Boolean to validate
     * @return boolean Validity is ok or not
     */
    static public function isBool($bool)
    {
        return is_null($bool) OR is_bool($bool) OR preg_match('/^0|1$/', $bool);
    }

    /**
     * Check for phone number validity
     *
     * @param string $phoneNumber Phone number to validate
     * @return boolean Validity is ok or not
     */
    static public function isPhoneNumber($phoneNumber)
    {
        return preg_match('/^[+0-9. ()-;]*$/', $phoneNumber);
    }

    /**
     * Check for postal code validity
     *
     * @param string $postcode Postal code to validate
     * @return boolean Validity is ok or not
     */
    static public function isPostCode($postcode)
    {
        return empty($postcode) OR preg_match('/^[a-zA-Z 0-9-]+$/', $postcode);
    }

    /**
     * Check for zip code format validity
     *
     * @param string $zip_code zip code format to validate
     * @return boolean Validity is ok or not
     */
    static public function isZipCodeFormat($zip_code)
    {
        if (!empty($zip_code))
            return preg_match('/^[NLCnlc -]+$/', $zip_code);
        return true;
    }

    /**
     * Check for country code validity
     *
     * @param string $country_code
     * @return boolean Validity is ok or not
     */
    static public function isCountryCode($country_code)
    {
        return preg_match('/^[a-zA-Z]{3}$/', $country_code);
    }

    /**
     * Check for currency code validity
     *
     * @param string $currency_code
     * @return boolean Validity is ok or not
     */
    static public function isCurrencyCode($currency_code)
    {
        return preg_match('/^[0-9]{3}$/', $currency_code);
    }


    /**
     * Check for an integer validity
     *
     * @param integer $value Integer to validate
     * @return boolean Validity is ok or not
     */
    static public function isInt($value)
    {
        return ((string)(int)$value === (string)$value OR $value === false OR empty($value));
    }

    /**
     * Check for an integer validity (unsigned)
     *
     * @param integer $value Integer to validate
     * @return boolean Validity is ok or not
     */
    static public function isUnsignedInt($value)
    {
        return (preg_match('#^[0-9]+$#', (string)$value) AND $value < 4294967296 AND $value >= 0);
    }

    /**
     * Check for a numeric string validity
     *
     * @param string $value String to validate
     * @return boolean Validity is ok or not
     */
    static public function isNumericString($value)
    {
        if(!is_string($value))
            return false;

        return (preg_match('#^[0-9]+$#', $value));
    }

    /**
     * Check url validity (disallowed empty string)
     *
     * @param string $url Url to validate
     * @return boolean Validity is ok or not
     */
    static public function isUrl($url)
    {
        return preg_match('/^[~:#%&_=\(\)\.\? \+\-@\/a-zA-Z0-9]+$/', $url);
    }

    /**
     * Check url validity
     *
     * @param string $url Object to validate
     * @return boolean Validity is ok or not
     */
    static public function isAbsoluteUrl($url)
    {
        if (!empty($url))
            return preg_match('/^https?:\/\/[:#%&_=\(\)\.\? \+\-@\/a-zA-Z0-9]+$/', $url);
        return true;
    }


    /**
     * String validity (PHP one)
     *
     * @param string $data Data to validate
     * @return boolean Validity is ok or not
     */
    static public function isString($data)
    {
        return is_string($data);
    }

    /**
     * Test if a variable is set
     *
     * @param mixed $field
     * @return boolean field is set or not
     */
    public static function isEmpty($field)
    {
        return ($field === '' OR $field === NULL);
    }

    /**
     * strlen overloaded function
     *
     * @param string $str
     * @return int size of the string
     */
    public static function strlen($str)
    {
        if (is_array($str))
            return false;

        if (function_exists('mb_strlen'))
            return mb_strlen($str, 'UTF-8');

        return strlen($str);
    }
}
