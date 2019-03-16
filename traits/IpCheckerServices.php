<?php

namespace DamianLewis\IpChecker\Traits;

use DamianLewis\IpChecker\Models\Settings;

trait IpCheckerServices
{

    /**
     * Check if the client's IP address matches the stored IP address.
     *
     * @return bool
     */
    public function isIpAddress(): bool
    {
        $clientIp = $this->getClientIpAddress();
        $pattern  = Settings::get('ip_address');

        if (!$clientIp) {
            return false;
        }

        if (!$pattern) {
            return false;
        }

        if (preg_match('/^' . $pattern . '/', $clientIp)) {
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
