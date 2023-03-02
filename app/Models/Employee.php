<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'user_pasport_seria',
        'user_full_name',
        'user_position',
        'user_phone_number',
        'user_address',
    ];


    public function Company(){
        return $this->belongsTo(Company::class);
    }
}
