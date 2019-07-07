<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kblais\Uuid\Uuid;
class emergency_table extends Model
{
    //
    use Uuid;
    public $incrementing = false;
    protected $table = 'emergency_table';
    public function users()
    {
        return $this->belongsTo(User::class, 'help_center_id', 'id');
    }
    public function help_seeker()
    {
        return $this->belongsTo(help_seekers::class, 'help_seeker_id', 'id');
    }
}
