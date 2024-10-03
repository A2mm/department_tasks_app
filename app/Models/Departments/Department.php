<?php

namespace App\Models\Departments;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'departments';

    public function employees(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
