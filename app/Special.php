<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Special
 * @package App
 * @mixin Builder
 */

class Special extends Model
{
    public function workers()
    {
        return $this->hasMany(Worker::class);
    }
}
