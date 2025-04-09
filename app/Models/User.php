<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Méthode pour définir la relation avec le modèle Student
    public function student(){
        // Un utilisateur peut avoir un étudiant associé
        return $this->hasOne(Student::class);
    }

    // Méthode pour définir la relation avec le modèle Fichier
    public function fichier(){
        // Un utilisateur peut avoir plusieurs fichiers associés
        return $this->hasMany(Fichier::class);
    }
    
    // Méthode pour définir la relation avec le modèle Article
    public function article(){
        // Un utilisateur peut avoir plusieurs articles associés
        return $this->hasMany(Article::class);
    }
}
