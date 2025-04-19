<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Request;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailRequest extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'request_id',
        'item_id',
        'qty',
        'notes',
    ];

    public function request() {
        return $this->belongsTo(Request::class, 'request_id');
    }

    public function item() {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
