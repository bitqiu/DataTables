<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'data';

    protected $fillable = ['name','ipmi_area','ipmi_addr','manage_area','manage_addr','park_area','park_addr','use','model'];
}
