<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Http\Resources\FichierResource; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Storage\Disk;

class Fichier extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'file_path', 'user_id' ];
    protected $casts = [
        'title' => 'array', // Si le champ "title" est un tableau JSON
    ];


    // Méthode pour définir la relation entre le fichier et l'utilisateur
    // Un fichier appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class); 
    }

    // Méthode pour définir la relation entre le fichier et le user
    // Un fichier appartient à un utilisateur
    public function userFichier()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //Méthode pour convertir l'attribut 'title' en JSON lors de la récupération et en tableau lors de l'enregistrement
    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true), 
            set: fn($value) => json_encode($value)
        );  
    }

    //Méthode pour récupérer tous les fichiers et les retourner sous forme de collection de ressources
    static public function titles(){
        $resource = FichierResource::collection(self::select()->orderby('title')->get())->resolve();
        return $resource;
    }

    public function fichierUrl(){
        $lienFichier = Storage::disk('public')->url($this->file_path);
        return $lienFichier;

    }
}
