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
        'city_id',
        'user_id'
    ];

    /**
     * Permet de définir et d'accéder à la ville à laquelle un étudiant appartient
     */
    public function city(){
        return $this->belongsTo(City::class);
    }

    // Permet de définir et d'accéder à l'utilisateur qui a créé l'étudiant
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Mutateur pour le nom de l'étudiant : convertit la première lettre de chaque mot en majuscule et le reste en minuscule avant de l'enregistrer dans la base de données et prend en compte les caractères accentués (UTF-8)
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = mb_convert_case(mb_strtolower($value, 'UTF-8'), MB_CASE_TITLE, 'UTF-8'); 
    }
}

