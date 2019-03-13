<?php
/**
 * Created by PhpStorm.
 * User: bratucornel
 * Date: 2019-03-13
 * Time: 12:25
 */

namespace Retargeting\Helpers;

use Retargeting\Exceptions\DecryptException;

/**
 * Class Decryption
 * @package Retargeting\Helpers
 */
class Decryption
{

    const TOKEN = "df2ce5cba06265db9bffeb6caf8d9fcf46a5a1712f774bca67535a82bdcf1955";
    const METHOD = "AES-256-CBC";
    const HASH_ALGORITHM = 'sha512';

    private $hash;

    public function __construct()
    {
        $this->hash = hash(self::HASH_ALGORITHM, self::TOKEN);
    }

    /**
     * @param $token
     * @param $nonce
     * @return string
     * @throws DecryptException
     */
    public function decrypt($token, $nonce = null)
    {
        $data = $this->tokenDecrypt($token, $this->hash, self::METHOD);

        if ($nonce && !$this->verifyNonce($nonce)) {
            throw new DecryptException('Invalid Nonce!');
        }

        return $data;
    }

    private function tokenDecrypt($data, $key, $method)
    {
        $data = base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
        $ivSize = openssl_cipher_iv_length($method);
        $iv = substr($data, 0, $ivSize);
        $data = openssl_decrypt(substr($data, $ivSize), $method, $key, OPENSSL_RAW_DATA, $iv);

        return $data;
    }

    /**
     * @param $nonce
     * @param int $clockSkew
     * @return bool
     */
    private function verifyNonce($nonce, $clockSkew = 60)
    {
        $nonce = base64_decode(
            str_pad(
                strtr($nonce, '-_', '+/'),
                strlen($nonce) % 4,
                '=',
                STR_PAD_RIGHT
            )
        );

        if (strlen($nonce) > 255) {
            return false;
        }

        $result = preg_match('/(\d{4})-(\d\d)-(\d\d)T(\d\d):(\d\d):(\d\d)Z(.*)/',
            $nonce,
            $matches);
        if ($result != 1 || count($matches) != 8) {
            return false;
        }

        $stamp = gmmktime($matches[4],
            $matches[5],
            $matches[6],
            $matches[2],
            $matches[3],
            $matches[1]);

        $time = time();
        if ($stamp < ($time - $clockSkew)
            || $stamp > ($time + $clockSkew)) {

            return false;
        }

        return true;
    }

}
