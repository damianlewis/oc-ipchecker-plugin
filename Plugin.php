<?php

namespace DamianLewis\IpChecker;

use DamianLewis\IpChecker\Components\IpChecker;
use DamianLewis\IpChecker\Models\Settings;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{

    public function pluginDetails(): array
    {
        return [
            'name'        => 'IP Checker',
            'description' => 'Provides client IP functions',
            'author'      => 'Damian Lewis',
            'icon'        => 'icon-filter',
        ];
    }

    public function registerPermissions(): array
    {
        return [
            'damianlewis.ipchecker.access_ip_settings' => [
                'tab'   => 'IP Checker',
                'label' => 'Manage the IP addresses',
            ],
        ];
    }

    public function registerSettings(): array
    {
        return [
            'ipAddresses' => [
                'label'       => 'IP Addresses',
                'description' => 'Manage the internal IP addresses.',
                'category'    => 'IP Checker',
                'icon'        => 'icon-filter',
                'class'       => Settings::class,
                'permissions' => ['damianlewis.ipchecker.access_ip_settings'],
                'keywords'    => 'ip',
                'order'       => 1001,
            ],
        ];
    }

    public function registerComponents(): array
    {
        return [
            IpChecker::class => 'ipChecker',
        ];
    }
}
