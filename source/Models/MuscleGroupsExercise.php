<?php

namespace Source\Models;

use Source\Core\Model;

class MuscleGroupsExercise extends Model
{
    public function __construct()
    {
        parent::__construct("muscle_groups_exercise", ["id"], ["exercises_id", "muscle_group_id"]);
    }
}
