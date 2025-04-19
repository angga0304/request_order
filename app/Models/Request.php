<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\DetailRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Request extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'request_number',
        'date',
        'employee_id',
    ];

    public function employee() {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function details() {
        return $this->hasMany(DetailRequest::class, 'request_id');
    }

    public function getActionAttribute() {
        return '<a href="/post/' . $this->id . '/edit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>';
    }
}
