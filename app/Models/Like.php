<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'data', 'created_at', 'section'
    ];
 /*    public $user_id;
    public $data;
    public $created_at;
    public $section; */
}
