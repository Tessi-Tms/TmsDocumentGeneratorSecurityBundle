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

    /**
     * {@inheritDoc}
     */
    public function getSecurityToken()
    {
        return $this->securityToken;
    }

    /**
     * {@inheritDoc}
     */
    public function generateToken($data, $salt)
    {
        return hash_hmac(self::$algorithm, $data, $salt);
    }

    /**
     * {@inheritDoc}
     */
    public function checkTokenValidity(array $data, $salt, $token)
    {
        $recalculatedToken = $this->generateToken(implode('.', $data), $salt);
        if ($recalculatedToken !== $token) {
            return false;
        }

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function decodeQueryDataToParameters($queryData)
    {
        return json_decode(base64_decode($queryData), true);
    }

    /**
     * {@inheritDoc}
     */
    public function encodeParametersToQueryData(array $parameters)
    {
        return base64_encode(json_encode($parameters));
    }
}