<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'item_code',
        'name',
        'warehouse_id',
        'stock',
        'unit_name',
    ];

    public function warehouse() {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function getSelectAttribute() {
        return "$this->item_code - $this->name";
    }
}
