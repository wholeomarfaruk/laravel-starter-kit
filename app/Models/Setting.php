<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ['group', 'key', 'value', 'type', 'label'];

    public static function get(string $key, mixed $default = null, string $group = 'general'): mixed
    {
        return Cache::rememberForever("setting:{$group}:{$key}", function () use ($key, $group, $default) {
            $setting = static::where('group', $group)->where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });
    }

    public static function set(string $key, mixed $value, string $group = 'general'): void
    {
        static::updateOrCreate(
            ['group' => $group, 'key' => $key],
            ['value' => $value]
        );
        Cache::forget("setting:{$group}:{$key}");
    }

    public static function getGroup(string $group): array
    {
        return Cache::rememberForever("settings:group:{$group}", function () use ($group) {
            return static::where('group', $group)->pluck('value', 'key')->toArray();
        });
    }

    public static function forgetGroup(string $group): void
    {
        Cache::forget("settings:group:{$group}");
        static::where('group', $group)->each(function ($s) {
            Cache::forget("setting:{$s->group}:{$s->key}");
        });
    }
}
