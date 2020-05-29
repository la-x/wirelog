<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    // Table Name
    protected $table = 'job';
    // Primary Key
    public $primaryKey = 'jobID';

    public function JobLog() {
        return $this->hasMany('App\JobLog', 'id');
    }

    public function technician() {
        return $this->hasMany('App\Technician', 'id');
    }
}
