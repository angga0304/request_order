<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warehouse extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'location_code',
        'notes',
    ];

    public function items() {
        return $this->hasMany(Item::class, 'item_id');
    }
}
