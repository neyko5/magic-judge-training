<?php

namespace MagicJudgeTraining;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public function questions()
    {
        return $this->hasMany('MagicJudgeTraining\Question');
    }
}
