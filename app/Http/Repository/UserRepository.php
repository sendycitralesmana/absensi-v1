<?php

namespace App\Http\Repository;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\Auth\VerifyMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserRepository
{

    public function getAll()
    {
        try {
            return User::get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function customGetAll($request)
    {
        try {
            $qUsers = User::query();
            $sRole = $request->searchRole;
            
            if ($sRole) {
                $qUsers->where('role_id', $sRole);
                $rolee = Role::where('id', $sRole)->first();
            } else {
                $rolee = '';
            }

            $users = $qUsers->get();
            $roles = Role::where('id', '!=', 1)->get();

            return [
                'users' => $users,
                'roles' => $roles,
                'sRole' => $sRole,
                'rolee' => $rolee
            ];
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getById($id)
    {
        try {
            return User::find($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store($request)
    {
        try {
            $password = $request->password;

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password); 
            $user->remember_token = Str::random(40);
            $user->role_id = $request->role;
            $user->save();

            Mail::to($user->email)->send(new VerifyMail($user, $password));

            return $user;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update($request, $id)
    {
        try {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role_id = $request->role;
            $user->save();
            return $user;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            return $user;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}