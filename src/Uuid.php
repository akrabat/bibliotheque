<?php
namespace Bibliotheque;

class Uuid
{
    /**
     * A very simple way to generate a UUID.
     * Credit: http://stackoverflow.com/questions/2040240/php-function-to-generate-v4-uuid/15875555#15875555
     *
     * @return string
     */
    public static function v4()
    {
        if (function_exists('random_bytes')) {
            $data = random_bytes(16);
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $data = openssl_random_pseudo_bytes(16);
        } else {
            mt_srand((double)microtime()*10000);
            $data = strtoupper(md5(uniqid(rand(), true)));
        }

        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}
