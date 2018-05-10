<?php

namespace App\Entities;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Favorites extends Model
{

    protected $fillable = ['user_id', 'post_id'];

    public function owner() {
        // RELACIONAMENTO 1:N
        return $this->belongsTo(User::class, 'user_id');
    }

    public function posts() {

        return $this->belongsTo(Post::class, 'post_id');
    }

}
