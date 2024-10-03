<?php

namespace App\Enums\Tasks;

class TaskStatusEnum
{
    const PENDING      = 'pending';
    const IN_PROGRESS  = 'inprogress';
    const DONE         = 'done';

    public static function statusNames()
    {
        return ['pending', 'inprogress', 'done'];
    }
}
