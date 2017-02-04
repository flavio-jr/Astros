<?php

namespace Core\Model;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Gbrock\Table\Traits\Sortable;

/**
 * Model class
 * @package Core\Model
 */
abstract class Model extends BaseModel
{
    use Sortable;

    protected $searchable = [];

    protected $primaryKey = 'id';

    public static function boot()
    {
        parent::boot();
    }
}
