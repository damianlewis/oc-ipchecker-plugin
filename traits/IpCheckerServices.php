<?php

namespace DamianLewis\IpChecker\Traits;

use DamianLewis\IpChecker\Classes\IpCheckerException;
use DamianLewis\IpChecker\Models\Settings;

trait IpCheckerServices
{

    /**
     * Check if the client's IP address matches the start IP address.
     *
     * @return bool
     * @throws IpCheckerException
     */
    public function isIpAddress(): bool
    {
        $startIp  = Settings::get('start_ip_address');

        if (!$startIp) {
            throw new IpCheckerException('Invalid start IP address.');
        }

        $clientIp = $this->getClientIpAddress();

        if (!$clientIp) {
            return false;
        }

        if (preg_match('/^' . $startIp . '/', $clientIp)) {
            return true;
        }

        return false;
    }

    /**
     * Check if the client's IP address is within the specified IP range.
     *
     * @return bool
     * @throws IpCheckerException
     */
    public function isWithinRange(): bool
    {
        $startIp  = ip2long(Settings::get('start_ip_address'));
        $endIp    = ip2long(Settings::get('end_ip_address'));

        if (!$startIp) {
            throw new IpCheckerException('Invalid start IP addresses.');
        }

        if (!$endIp) {
            throw new IpCheckerException('Invalid end IP addresses.');
        }

        $clientIp = ip2long($this->getClientIpAddress());

        if (!$clientIp) {
            return false;
        }

        if ($clientIp >= $startIp && $clientIp <= $endIp) {
            return true;
        }

        return false;
    }

    /**
     * Returns the IP address of the remote client.
     *
     * @return string|null
     */
    protected function getClientIpAddress()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
            return $_SERVER['REMOTE_ADDR'];
        }

        return null;
    }

}
