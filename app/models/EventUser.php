<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    protected $fillable = ['event_id','user_id','accepted'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->belongsTo(Event::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->belongsTo(users::class);
    }
}
