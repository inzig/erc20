<?php

namespace BCES\Concerns;


trait ETHValidate
{
    protected function verifyEthereum($address)
    {
        if (!preg_match('/^(0x)?[0-9a-f]{40}$/i', $address)) {
            return false;
        }
        else if (!preg_match('/^(0x)?[0-9a-f]{40}$/', $address) || preg_match('/^(0x)?[0-9A-F]{40}$/', $address)) {
            return false;
        }
        else if (!$this->isChecksumAddress($address)) {
            return false;
        }

        return true;
    }

    protected function isChecksumAddress($address)
    {
        // Check each case
        $address = str_replace('0x', '', $address);
        $addressHash = hash('sha3', strtolower($address));
        $addressArray = str_split($address);
        $addressHashArray = str_split($addressHash);

        for ($i = 0; $i < 40; $i++) {
            // the nth letter should be uppercase if the nth digit of casemap is 1
            if ((intval($addressHashArray[$i], 16) > 7 && strtoupper($addressArray[$i]) !== $addressArray[$i]) || (intval($addressHashArray[$i], 16) <= 7 && strtolower($addressArray[$i]) !== $addressArray[$i])) {
                return false;
            }
        }

        return true;
    }
}