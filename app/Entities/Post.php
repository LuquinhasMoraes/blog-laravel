<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Post.
 *
 * @package namespace App\Entities;
 */
class Post extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'subtitle', 'description', 'users_id', 'categories_id', 'created_at'];

    public function getMaskCreatedAtAttribute () {
        return date('d/m/Y H:i', strtotime($this->attributes['created_at']));
    }

    public function favorites() {
        return $this->belongsTo(Favorites::class);
    }

}
