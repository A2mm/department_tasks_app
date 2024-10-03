<?php

namespace App\Services\Lookups;

use App\Models\User;
use App\Traits\HasUser;
use Illuminate\Http\Request;
use App\Models\Departments\Department;
use Illuminate\Database\Eloquent\Collection;

class LookupsService
{
    use HasUser;

    public function fetchMyEmployees(): Collection
    {
        return $this->user()->children()->select('id', 'firstname', 'lastname')->get();
    }

    public function fetchDepartments(): Collection
    {
        return Department::select('id', 'title')->get();
    }
}
