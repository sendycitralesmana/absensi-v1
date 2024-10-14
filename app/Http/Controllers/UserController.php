<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\RoleRepository;
use App\Http\Repository\UserRepository;
use App\Http\Requests\User\CreateRequest;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    
    private $userRepository;
    private $roleRepository;

    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index(Request $request)
    {
        $users = $this->userRepository->customGetAll($request);
        return view('backoffice.user-data.user.index', $users);
    }

    public function create(CreateRequest $request)
    {

        try {
            $user = $this->userRepository->store($request);
            return redirect('/backoffice/user-data/user')->with('success', 'Data pengguna telah ditambahkan, beritahu ' . $user->name . ' untuk melakukan verifikasi akun');

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $this->userRepository->delete($id);
            return redirect()->back()->with('success', 'Pengguna telah di hapus');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
