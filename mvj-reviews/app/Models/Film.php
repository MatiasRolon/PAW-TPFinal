<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    // No tocar
    const SERIE = 'Serie';
    const PELICULA = 'Pelicula';
    const CORTOMETRAJE = 'Cortometraje';
    public static $categorias = [self::SERIE, self::PELICULA, self::CORTOMETRAJE];

    protected $table = 'film';

    protected $fillable = ['titulo','fecha_estreno','pais','sinopsis','duracion_min',
                          'categoria','fecha_finalizacion','puntaje','poster','trailer', 'id_themoviedb', 'hash'];

    public function tags(){
      return $this->belongsToMany('App\Models\Tag', 'tag_film', 'film_id', 'tag_id');
    }

    public function genres(){
      return $this->belongsToMany('App\Models\Genre', 'genre_film', 'film_id', 'genre_id');
    }

    public function artists(){
      // Creo que es belongsToMany
      return $this->hasMany('App\Models\Film_Artist', 'film_id', 'id');
    }

    public function reviews(){
      return $this->hasMany('App\Models\Review', 'film_id', 'id');
    }

    // Puntaje que le dieron los usuarios al film
    public function userRatings() {
      return $this->hasMany('App\Models\Score_Film', 'film_id', 'id');
    }

    public static function boot()
   {
       parent::boot();

       self::creating(function ($film) {
              $film->puntaje = 0;
           }
        );

   }
}
