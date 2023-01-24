<?php

namespace App\Repositories\Implements;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{
    protected $model_class = User::class;

    public function processRegister($data)
    {
        $record = $this->model->newQuery()->create($data);
        $record->save();
        $record->refresh();
        return $record;
    }

    public function check($data)
    {
        if (Auth::attempt($data)) {
            toast()->success('Signed In', 'Successfully');
            return redirect()->route('coffee.create');
        } else {
            toast('Login fail, wrong username or password','error');
            return back();
        }
    }
}
