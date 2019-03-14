<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-03-13
 * Time: 12:25
 */

namespace Retargeting\Helpers;

/**
 * Class Encryption
 * @package Retargeting\Helpers
 */
class Encryption
{
    const TOKEN = "df2ce5cba06265db9bffeb6caf8d9fcf46a5a1712f774bca67535a82bdcf1955";

    const METHOD = "AES-256-CBC";
    const HASH_ALGORITHM = 'sha512';

    private $customer;
    private $token;

    /**
     * Encryption constructor.
     * @param $customer
     * @param $token
     */
    public function __construct($customer, $token)
    {
        $this->customer = $customer;
        $this->token    = $token;
    }

    /**
     * @param $data
     * @return string
     */
    public static function encrypt($data)
    {
        $ivSize = openssl_cipher_iv_length(self::METHOD);
        $iv = openssl_random_pseudo_bytes($ivSize);

        $encrypted = openssl_encrypt($data, self::METHOD, self::createKey(), OPENSSL_RAW_DATA, $iv);


        return rtrim(strtr(base64_encode($iv . $encrypted), '+/', '-_'), '=');
    }

    /**
     * @return string
     */
    private static function createKey()
    {
        return hash('sha512', self::TOKEN);
    }

    /**
     * @return mixed
     */
    public function decodeCustomer()
    {
        return json_decode($this->customer);
    }

    /**
     * @param int $length
     * @param null $time
     * @return string
     */
    private function generateNonce($length = 12, $time = null)
    {
        $time = ($time === null) ? time() : $time;
        $nonce = gmstrftime('%Y-%m-%dT%H:%M:%SZ', $time);

        if ($length < 1) {
            return $nonce;
        }

        $length = (int)$length;
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';

        $unique = '';
        for ($i = 0; $i < $length; $i++) {
            $unique .= substr($chars, (rand() % (strlen($chars))), 1);
        }

        return rtrim(strtr(base64_encode($nonce . $unique), '+/', '-_'), '=');
    }

}
