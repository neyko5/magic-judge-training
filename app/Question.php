<?php

namespace MagicJudgeTraining;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    public function lesson()
    {
        return $this->belongsTo('MagicJudgeTraining\Lesson');
    }
}
