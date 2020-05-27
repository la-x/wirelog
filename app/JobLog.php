<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobLog extends Model
{
    // Table Name
    protected $table = 'job_log';
    // Primary Key
    public $primaryKey = 'job_logID';

    // public function getJobs() {
    //         return $this->belongsTo('App\Job' ,'jobID' );
    // }
    public function test() {
            //
    }
}
