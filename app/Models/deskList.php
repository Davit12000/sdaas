<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deskList extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'desk_id'];
}
