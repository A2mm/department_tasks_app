<?php

namespace App\Traits;

use App\Models\User;

trait HasUser
{
    private function user(): User
    {
        return auth()->user();
    }
}
