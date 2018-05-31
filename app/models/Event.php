<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name','category_id','name','place','latitude','logitude','start_date','end_date','start_time','end_time','image','category_map_marker','user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->belongsTo('App\models\Category','category_id');
    }

}
