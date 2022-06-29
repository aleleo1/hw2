<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sumup extends Model
{
    use HasFactory;

    protected $table = 'sumups';
    protected $primarykey = 'ID';
}
