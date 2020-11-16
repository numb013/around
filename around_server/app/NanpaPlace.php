<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NanpaPlace extends Model
{
    protected $fillable = [
		'place_name',
		'genre',
		'score',
		'longitude',
		'latitude',
		'open_flag',
		'ratio',
		'icon',
		'start_time',
		'end_time',
		'start_age_group',
		'end_age_group',
		'memo',
    ];
}
