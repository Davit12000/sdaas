<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Desk extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'dask_id'];
    public function lists(): HasMany{
        return $this->HasMany(deskList::class, 'desk_id', 'id');
    }

}