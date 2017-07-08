<?php

namespace MagicJudgeTraining;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public function user()
    {
        return $this->belongsTo('MagicJudgeTraining\User');
    }

    public function questions()
    {
        return $this->hasMany('MagicJudgeTraining\Question');
    }

    
}
