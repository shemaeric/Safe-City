<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Kblais\Uuid\Uuid;
use Illuminate\Notifications\Notifiable;
class help_seekers extends Model
{
    //
    use Notifiable;
    use Uuid;
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'first_name','last_name','my_phone_number','referee_phone_number','code','api_token'
    ];
}
