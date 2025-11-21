<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Supplier extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'address'
    ];
    
    /**
     * Return the items for this supplier
     */
    public function items() : HasMany {
        return $this->hasMany(Item::class);
    }
    
    /**
     * Return the editors for this supplier
     */
    public function editors() : BelongsToMany {
        return $this->belongsToMany(User::class);
    }
}