<?php

namespace Tms\Bundle\DocumentGeneratorSecurityBundle\Security;

interface SecurityInterface
{
    /**
     * Get the configurated security token
     */
    public function getSecurityToken();

    /**
     * Generate a token from a given string
     *
     * @param string $data
     * @param string $salt
     * @return string
     */
    public function generateToken($data, $salt);

    /**
     * Determine if a token is valid
     *
     * @param array  $data
     * @param string $salt
     * @param string $token
     * @return boolean
     */
    public function checkTokenValidity(array $data, $salt, $token);

    /**
     * Decode data string and return an associative array
     *
     * @param string $queryData
     * @return array
     */
    public function decodeQueryDataToParameters($queryData);

    /**
     * Encode an associative array to a string
     *
     * @param array $parameters
     * @return string
     */
    public function encodeParametersToQueryData(array $parameters);
}