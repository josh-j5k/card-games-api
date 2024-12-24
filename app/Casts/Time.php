<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class Time implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        $time = '';
        $floatMinutes = $value / 60;
        [$min, $seconds] = explode('.', (string) $floatMinutes);
        if (strlen($min) === 1) {
            $time = "0$min";
        } else {
            $time = $min;
        }
        $strSec = round((float) "0.$seconds" * 60);
        if (strlen((string) $strSec) === 1) {
            $time .= " : 0$strSec";
        } else {
            $time .= " : $strSec";
        }
        return $time;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        [$min, $sec] = explode(":", $value);
        $floatSec = (int) $min * 60 + (int) $sec;

        return $floatSec;
    }
}
