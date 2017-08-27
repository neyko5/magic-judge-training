<?php

namespace MagicJudgeTraining;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function user()
    {
        return $this->belongsTo('MagicJudgeTraining\User');
    }

    public function tags()
    {
        return $this->belongsToMany('MagicJudgeTraining\Tag');
    }

    public function  tagsString() {
        return implode (", ", $this->tags->pluck("title")->toArray());
    }
}
