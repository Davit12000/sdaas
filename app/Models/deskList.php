<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class deskList extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'desk_id'];
    public function tasks(): HasMany{
        return $this->HasMany(task::class, 'desk_lists_id', 'id');
    }
}
