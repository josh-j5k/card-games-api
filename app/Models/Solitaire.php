<?php

namespace App\Models;

use App\Casts\Time;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Solitaire extends Model
{
    /** @use HasFactory<\Database\Factories\SolitaireFactory> */
    use HasFactory;
    protected $table = 'solitaire';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'score',
        'time',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'updated_at',
        'created_at',
        'id'
    ];
    /**
     * Get the user's first name.
     */
    protected function time(): Attribute
    {
        return Attribute::make(
            get: function (string $value) {
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
                    $time .= ":0$strSec:00";
                } else {
                    $time .= ":$strSec:00";
                }
                return $time;
            },
        );
    }
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    // protected function casts(): array
    // {
    //     return [
    //         'time' => Time::class
    //     ];
    // }
}
