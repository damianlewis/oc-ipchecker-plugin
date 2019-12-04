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
            'name' => 'IP Checker',
            'description' => 'Provides client IP functions',
            'author' => 'Damian Lewis',
            'icon' => 'icon-filter'
        ];
    }

    public function registerPermissions(): array
    {
        return [
            'damianlewis.ipchecker.access_settings' => [
                'tab' => 'IP Checker',
                'label' => 'Configure the IP addresses.'
            ],
        ];
    }

    public function registerSettings(): array
    {
        return [
            'settings' => [
                'label' => 'IP Checker',
                'description' => 'Configure the IP addresses.',
                'icon' => 'icon-filter',
                'class' => Settings::class,
                'permissions' => ['damianlewis.ipchecker.access_settings'],
                'keywords' => 'ip',
                'order' => 1001
            ]
        ];
    }

    public function registerComponents(): array
    {
        return [
            IpChecker::class => 'ipChecker'
        ];
    }
}
