<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'dob',
        'city_id'
    ];

    /**
     * Permet de définir et d'accéder à la ville à laquelle un étudiant appartient
     */
    public function city(){
        return $this->belongsTo(City::class);
    }
}
