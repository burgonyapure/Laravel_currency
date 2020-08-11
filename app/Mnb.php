<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mnb extends Model
{
    const CREATED_AT = 'ervenyes';
    const UPDATED_AT = 'ervenyes';

    protected $connection = 'mysql3';
    protected $table = 'mnb';

    protected $fillable = [
        'ervenyes', 'valuta', 'ar'
    ];
}
