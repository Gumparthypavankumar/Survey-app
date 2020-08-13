<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $guarded =[];

    public function responses()
    {
        return $this->hasMany(SurveyResponse::class);
    }
    
    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }
}
