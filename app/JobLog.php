<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobLog extends Model
{
    // Table Name
    protected $table = 'job_log';
    // Primary Key
    public $primaryKey = 'job_logID';

    const CREATED_AT = 'c_at';
    const UPDATED_AT = 'u_at';

    public function Job() {
            return $this->belongsTo('App\Job');
    }

    public function technician() {
            return $this->belongsTo('App\Technician');
    }
}
