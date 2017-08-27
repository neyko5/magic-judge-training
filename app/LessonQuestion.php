<?php

namespace MagicJudgeTraining;

use Illuminate\Database\Eloquent\Model;

class LessonQuestion extends Model
{

    public function lesson()
    {
        return $this->belongsTo('MagicJudgeTraining\Lesson');
    }
}
