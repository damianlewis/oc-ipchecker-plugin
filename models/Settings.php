<?php

namespace DamianLewis\IpChecker\Models;

use Model;
use October\Rain\Database\Traits\Validation;
use System\Behaviors\SettingsModel;

class Settings extends Model
{

    use Validation;

    /**
     * Implemented behaviours.
     *
     * @var array
     */
    public $implement = [
        SettingsModel::class,
    ];

    /**
     * Unique key.
     *
     * @var array
     */
    public $settingsCode = 'ip_checker_settings';

    /**
     * Field definitions.
     *
     * @var array
     */
    public $settingsFields = 'fields.yaml';


    /**
     * The rules to be applied to the data.
     *
     * @var array
     */
    public $rules = [
        'start_ip_address' => [
            'required',
            'ip',
        ],
        'end_ip_address'   => 'ip',
    ];
}
