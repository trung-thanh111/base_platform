<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasQuery;

class GalleryCatalogue extends Model
{
    use HasFactory, SoftDeletes, HasQuery;

    protected $table = 'gallery_catalogues';

    protected $fillable = [
        'name',
        'description',
        'image',
        'publish',
        'order',
        'user_id',
    ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'gallery_catalogue_id', 'id');
    }

    protected $relationable = ['users'];

    public function getRelationable()
    {
        return $this->relationable;
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
