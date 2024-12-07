<?php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table = 'feedbacks';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'event_id',
        'user_id',
        'feedback_text',
        'rating'
    ];

    protected $useTimestamps = false;
}
