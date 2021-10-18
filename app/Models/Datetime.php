<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Datetime extends Model
{
    protected $table = 'datetimes';

    public $timestamps = false;
}
