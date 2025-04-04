<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transforme la ressource en un tableau. Définit la manière dont les données de l'article seront renvoyées.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => isset($this->title[app()->getLocale()]) ? $this->title[app()->getLocale()] : $this->title['fr'],
            'content' => isset($this->content[app()->getLocale()]) ? $this->content[app()->getLocale()] : $this->content['fr'],
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
