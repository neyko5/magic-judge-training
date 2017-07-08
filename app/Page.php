<?php

namespace MagicJudgeTraining;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function user()
    {
        return $this->belongsTo('MagicJudgeTraining\User');
    }
}
