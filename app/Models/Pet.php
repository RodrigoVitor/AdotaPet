<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    protected $date = ['date'];
    protected $guarded = [];
    protected $fillable = ['name', 'description', 'image', 'date', 'city', 'UF', 'user_id'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
