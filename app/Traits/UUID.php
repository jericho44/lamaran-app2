<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait UUID
{
    protected static function bootUUID()
    {
        static::creating(function (Model $model) {
            if (empty($model->uuid)) {
                $model->uuid = Str::orderedUuid()->toString();
            }
        });
    }
}
