<?php

namespace App\Models;

use CodeIgniter\Model;

class OrganizerModel extends Model
{
    protected $table = 'organizers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'contact_info'];
}
