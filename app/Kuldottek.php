<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuldottek extends Model
{
    protected $connection = 'mysql3';
    protected $table = 'arfolyam';
    public $timestamps = false;
    protected $fillable = [
        'irodanev', 'valutanev', 'vetel','eladas','datum','egysegtipus','kedvezmeny'
    ];
}
