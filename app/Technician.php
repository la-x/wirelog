<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    // Table Name
    protected $table = 'technician';
    // Primary Key
    public $primaryKey = 'technicianID';

    public function user() {
        return $this->hasOne('App\User', 'id');
    }

    public function job() {
        return $this->hasMany('App\Job', 'id');
    }

    public function JobLog() {
        return $this->hasMany('App\JobLog', 'id');
    }
}
