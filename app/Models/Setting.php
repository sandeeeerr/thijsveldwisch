<?php

namespace App\Models;

use Parsedown;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    public static function get($key, $default = null)
    {
        return self::where('key', $key)->first()?->value ?? $default;
    }

    public static function set($key, $value)
    {
        return self::updateOrCreate(['key' => $key], ['value' => $value]);
    }

    public function getParsedValueAttribute(): string
    {
        return (new Parsedown())->text($this->value);
    }
}
