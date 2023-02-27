<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'boss_full_name',
        'address',
        'email',
        'company_site',
        'phone_number',
    ];


    public function companyUsers(){
        return $this->hasMany(Employee::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}