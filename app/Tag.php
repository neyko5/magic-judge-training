<?php

namespace MagicJudgeTraining;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;

    public function questions()
    {
        return $this->belongsToMany('MagicJudgeTraining\Question');
    }
}
