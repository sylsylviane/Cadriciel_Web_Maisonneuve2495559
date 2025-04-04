<?php

namespace App\Models;

use App\Http\Resources\ArticleResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    // Méthode pour définir la relation entre l'article et l'utilisateur
    // Un article appartient à un utilisateur
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Méthode pour convertir l'attribut 'title' en JSON lors de la récupération et en tableau lors de l'enregistrement
    protected function title(): Attribute{
        return Attribute::make(
            get:fn($value) => json_decode($value, true),
            set:fn($value) => json_encode($value)
        );
    }

    // Méthode pour convertir l'attribut 'content' en JSON lors de la récupération et en tableau lors de l'enregistrement
    protected function content(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value)
        );
    }

    // Méthode pour récupérer tous les articles et les retourner sous forme de collection de ressources
    static public function articles(){
        $resource = ArticleResource::collection(self::select()->orderBy('title')->get())->resolve();
        return $resource;
    }
}
