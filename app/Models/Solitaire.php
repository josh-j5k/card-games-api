<?php

namespace App\Models;

use App\Casts\Time;
use Illuminate\Database\Eloquent\Model;

class Solitaire extends Model
{
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'time' => Time::class
        ];
    }
}
