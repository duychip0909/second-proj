<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Services\Interfaces\IAdminService;
use Mockery\Exception;

class AdminController extends Controller
{
    private $adminService;

    public function __construct(IAdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function admin()
    {
        return view('login-form');
    }

    public function register()
    {
        return view('register');
    }

    public function signup(RegisterUserRequest $request)
    {
        try {
            $validated = $request->validated();
            $this->adminService->processRegister($validated);
            if ($validated == null) {
                toast('Create account fail','error');
                return back();
            }
            toast('Create account successfully','success');
            return redirect()->route('login-form');
        } catch (Exception $e) {
            toast('Create account fail','error');
            return back();
        }
    }

    public function check(LoginUserRequest $request)
    {
        $validated = $request->validated();
        return $this->adminService->check($validated);
    }
}
