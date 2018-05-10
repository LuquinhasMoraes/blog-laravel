<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Categories.
 *
 * @package namespace App\Entities;
 */
class Categories extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'created_at'];

    public function getMaskCreatedAtAttribute() {
        return date('d/m/Y H:i', strtotime($this->attributes['created_at']));
    }

}
