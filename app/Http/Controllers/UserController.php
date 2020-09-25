<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\InsertUserRequest;
use Session;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */

         /**
     * @var userRepositoryInterface|\App\Repositories\Repository
     */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;

    }
    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $arrayUser = $this->userRepository->getAll();

        return view('user.viewAll', compact('arrayUser'));
    }

    public function insert()
    {
        return view('user.insert');
    }

    public function processInsert(InsertUserRequest $request)
    {
        $data = $request->all();
        $password=Hash::make($request->password);
        $data['password']= $password;
        $this->userRepository->create($data);
        return redirect()->route('user.getAll');
    }

    public function update($id)
    {
        $user = $this->userRepository->find($id);
        return view('user.update', compact('user'));
    }

    public function processUpdate(UserStoreRequest $request,$id)
    {
        try {
            $oldPassword=Hash::make($request->oldPassword);
            $this->userRepository->checkPassword($id,$oldPassword);

        } catch (\Exception $e) {
            return redirect()->route('user.update', ['id'=>$id])->with('error_password','Old Password Incorrect');
        }
        $validated = $request->validated();

        $data['name']=$request->name;

        $newPassword=Hash::make($request->newPassword);
        $data['password']= $newPassword;

        $this->userRepository->update($id, $data);

        return redirect()->route('user.getAll');
    }

    public function delete(Request $request)
    {
        try {
            $id = $request->id;
            $user = $this->userRepository->findOrFail($id);

        } catch (\Exception $e) {
            return response()->json(["success" => false, 'message' => $e->getMessage()], 400);
        }
        $user->delete();
        return response()->json(['success' => '']);


    }
}
