<?php

namespace App\Services\Employees;

use App\Models\User;
use App\Traits\HasUser;
use Illuminate\Http\Request;
use App\Services\Upload\UploadService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class EmployeeService
{
    use HasUser;

    private UploadService $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    public function index(array $filters)
    {
        $search = $filters['search'] ?? null;
        return $this->user()->children()
        ->when($search, function (Builder $query, $value) {
            return $query->where('firstname', "LIKE", "%".$value."%")->orWhere('lastname', "LIKE", "%".$value."%");
        })
        ->paginate(paginationSize());
    }

    public function store(array $data): User
    {
        $data['image']     = $this->uploadImage($data['image'] ?? null);
        $data['password']  = generateComplexPassword($data['firstname']);
        return $this->user()->children()->create($data);
    }

    public function update(array $data, User $employee): bool
    {
        $data['image'] = $this->uploadImage($data['image'] ?? null);
        return $employee->update($data);
    }

    public function delete(User $employee): bool
    {
        return $employee->delete();
    }

    private function uploadImage($image): string|null
    {
        return $image == null ? null : $this->uploadService->upload($image, 'employees');
    }
}
