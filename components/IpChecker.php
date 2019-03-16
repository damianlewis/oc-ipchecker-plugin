<?php

namespace DamianLewis\IpChecker\Components;

use Cms\Classes\ComponentBase;
use DamianLewis\IpChecker\Traits\IpCheckerServices;

class IpChecker extends ComponentBase
{

    use IpCheckerServices;

    /**
     * The client's IP address.
     *
     * @var string
     */
    public $clientIp;

    public function componentDetails(): array
    {
        return [
            'name'        => 'Ip Checker',
            'description' => 'Checks the client IP address.',
        ];
    }

    public function onRun()
    {
        $this->clientIp = $this->page['clientIp'] = $this->getClientIpAddress();
    }
}
