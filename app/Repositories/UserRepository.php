<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

class UserRepository
{
    public function getAll()
    {
        return User::all();
    }

    public function getById($id)
    {
        return User::findOrFail($id);
    }

    public function create(Request $request)
    {
        $User = new User();
        $User->fill($request->all());
        if($User->save()){
             return $User;
        }else{
            return null;
        }
    }

    public function update(Request $request)
    {
        $user = User::where('email', $request['email'])->update($request->only(['name', 'cellphone', 'rol_id']));
        return $user;
    }

    public function delete($id)
    {
        $user = User::where('email', $id)->delete();
        return $user;
    }
}
