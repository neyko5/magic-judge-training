<?php

namespace MagicJudgeTraining;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function user()
    {
        return $this->belongsTo('MagicJudgeTraining\User');
    }

    public function lesson()
    {
        return $this->belongsTo('MagicJudgeTraining\Lesson');
    }
}
