<?php

namespace App\Enums;

enum SettingKey: string
{
    case SERVICES = 'services';
    case EXPERIENCE = 'experience';
    case ABOUT = 'about';
    case INFO_CONTACT = 'info_contact';

    public static function labels(): array
    {
        return [
            self::SERVICES->value => 'Services',
            self::EXPERIENCE->value => 'Experience',
            self::ABOUT->value => 'About',
            self::INFO_CONTACT->value => 'Info+Contact',
        ];
    }
}
