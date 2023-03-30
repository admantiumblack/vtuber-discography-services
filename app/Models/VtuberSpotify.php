<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VtuberSpotify extends Model
{
    use HasFactory;

    protected $table = 'vtuber_spotify';

    protected $primaryKey = 'vtuber_id';

    protected $fillable = [
        'spotify_id',
    ];
}
