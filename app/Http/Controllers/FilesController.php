<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilesController extends Controller
{
    protected $fillable = [
        'name', 'type', 'extension', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
