<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['employee_id', 'hours'];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
