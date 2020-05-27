<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    // Table Name
    protected $table = 'job';
    // Primary Key
    public $primaryKey = 'jobID';
}
