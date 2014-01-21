<?php

/**
 * @author Jean-Philippe Chateau <jp.chateau@trepia.fr>
 * @licence MIT
 */

namespace Tms\Bundle\DocumentGeneratorSecurityBundle\Security;

class Security implements SecurityInterface
{
    private static $algorithm = 'md5'; // Algorithm used to generate the token
    private $securityToken;

    public function __construct($securityToken)
    {
        $this->securityToken = $securityToken;
    }

    public function getSecurityToken()
    {
        return $this->securityToken;
    }

    /**
     * Generate a token from a given string
     *
     * @param string $data
     * @param string $key
     * @return string
     */
    public function generateToken($data, $key)
    {
        return hash_hmac(self::$algorithm, $data, $key);
    }

    /**
     * Determine if a token is valid
     *
     * @param array $data
     * @param string $key
     * @param string $token
     * @return boolean
     */
    public function checkTokenValidity(array $data, $key, $token)
    {
        $recalculatedToken = $this->generateToken(implode('.', $data), $key);
        if ($recalculatedToken !== $token) {
            return false;
        }

        return true;
    }

    /**
     * Decode data string and return an associative array
     *
     * @param string $queryData
     * @return array
     */
    public function decodeQueryDataToParameters($queryData)
    {
        return json_decode(base64_decode($queryData), true);
    }

    /**
     * Encode an associative array to a string
     *
     * @param array $parameters
     * @return string
     */
    public function encodeParametersToQueryData(array $parameters)
    {
        return base64_encode(json_encode($parameters));
    }
}