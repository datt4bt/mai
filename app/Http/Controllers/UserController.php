<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Exceptions\RenderException;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\InsertUserRequest;
use Session;
use App\Http\Resources\Users as UserResource;
use Dingo\Api\Routing\Helpers;
use Hash;


class UserController extends Controller
{
    use Helpers;

    /**
     * Show the profile for the given user.
     *
     * @param int $id
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
        $users = $this->userRepository->getAll();
        return UserResource::collection($users);

    }

    public function show()
    {
        $user = $this->userRepository->show();
        return UserResource::collection($user);
    }

    public function getOne($id)
    {
        //$id = Auth::id();
        $user = $this->userRepository->getOne($id);
        return UserResource::collection($user);

    }

    public function insert()
    {
        return view('user.insert');
    }

    public function processInsert(InsertUserRequest $request)
    {
        $data = $request->all();
        $password = Hash::make($request->password);
        $data['password'] = $password;
        $user = $this->userRepository->create($data);
        return new UserResource($user);
    }

    public function update($id)
    {
        $user = $this->userRepository->find($id);
        return view('user.update', compact('user'));
    }

    public function processUpdate(UserStoreRequest $request, $id)
    {
        $validated = $request->validated();
        $data['name'] = $request->name;
        if ($request->password != null) {
            $data['password'] = Hash::make($request->password);
        }
        $user = $this->userRepository->update($id, $data);
        return new  UserResource($user);

    }

//    public function deleteAJ(Request $request)
//    {
//        try {
//            $id = $request->id;
//            $user = $this->userRepository->findOrFail($id);
//
//        } catch (\Exception $e) {
//            return response()->json(["success" => false, 'message' => $e->getMessage()], 400);
//        }
//        $user->delete();
//        return response()->json(['success' => '']);
//
//
//    }
    public function delete($id)
    {
        $user = $this->userRepository->delete($id);
        return response()->json(['result' => $user]);
    }
}
