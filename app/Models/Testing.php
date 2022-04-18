<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Testing
 * @package App\Models
 * @version February 6, 2022, 5:49 am +07
 *
 * @property string $name
 */
class Testing extends EloquentModel
{
    use SoftDeletes;




}
