<?php

namespace App\Services\Implement;

use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Services\Interfaces\IAdminService;
use Illuminate\Support\Facades\Hash;

class AdminService implements IAdminService
{
    protected $adminRepository;

    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    function processRegister($data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->adminRepository->processRegister($data);
    }

    function check($data)
    {
        return $this->adminRepository->check($data);
    }
}
