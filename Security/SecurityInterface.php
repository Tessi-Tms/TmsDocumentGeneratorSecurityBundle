<?php

namespace Tms\Bundle\DocumentGeneratorSecurityInterface\Security;

interface SecurityInterface
{
    public function getSecurityToken();

    public function generateToken();

    public function checkTokenValidity();

    public function decodeQueryDataToParameters($queryData);

    public function encodeParametersToQueryData(array $parameters);
}