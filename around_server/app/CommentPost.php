<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentPost extends Model
{
    protected $fillable = [
		'nanpa_place_id',
		'name',
		'comment',
    ];
}
