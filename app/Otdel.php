<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * Class Otdel
 * @package App
 * @mixin Builder
 */

class Otdel extends Model
{
    use Sluggable;

    protected $fillable  = ['f_name','s_name', 'sort', 'parent_id'];

    public function workers()
    {
        return $this->hasMany(Worker::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 's_name'
            ]
        ];
    }

}
