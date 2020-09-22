<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    public function processInsert(Request $request)
    {
        $name=$request->name;
        $email=$request->username;
        $password=Hash::make($request->password);

        //... Validation here

        $this->userRepository->create($name,$email,$password);

        return redirect()->route('user.getAll');
    }
    public function update($id)
    {
        $user = $this->userRepository->find($id);

        return view('user.update', compact('user'));
    }
    public function processUpdate(Request $request,$id)
    {  $data = $request->all();

        //... Validation here

        $this->userRepository->update($id, $data);

        return redirect()->route('user.getAll');
    }
    public function delete($id)
    {
      $this->userRepository->delete($id);

      return redirect()->route('user.getAll');
    }
}
