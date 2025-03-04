<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * Permet de définir et d'accéder aux étudiants qui appartiennent à une ville donnée
     */
    public function students(){
        return $this->hasMany(Student::class);
    }
}
