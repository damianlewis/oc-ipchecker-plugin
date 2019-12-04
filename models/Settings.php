<?php

namespace DamianLewis\IpChecker\Models;

use Model;
use October\Rain\Database\Traits\Validation;
use System\Behaviors\SettingsModel;

class Settings extends Model
{
    use Validation;

    public $implement = [
        SettingsModel::class,
    ];

    public $settingsCode = 'ip_checker_settings';

    public $settingsFields = 'fields.yaml';

    public $rules = [
        'ip_address' => [
            'required',
            'ip'
        ],
        'end_ip_address' => 'ip'
    ];
}
