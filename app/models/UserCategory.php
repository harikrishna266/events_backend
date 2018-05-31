<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{
    protected $fillable = ['user_id','category_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->belongsTo('App\models\Users','user_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->belongsTo('App\models\Category','category_id');
    }
}
