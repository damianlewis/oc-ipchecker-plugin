<?php

namespace DamianLewis\IpChecker\Components;

use Cms\Classes\ComponentBase;
use DamianLewis\IpChecker\Traits\IpCheckerServices;

class IpChecker extends ComponentBase
{

    use IpCheckerServices;

    public function componentDetails(): array
    {
        return [
            'name'        => 'Ip Checker',
            'description' => 'Checks the client IP address.',
        ];
    }
}
