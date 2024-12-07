<?php

namespace App\Models;

use CodeIgniter\Model;

class ScheduleModel extends Model
{
    protected $table = 'schedules';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'event_id',
        'schedule_date',
        'activity'
    ];

    protected $useTimestamps = false; 
}
