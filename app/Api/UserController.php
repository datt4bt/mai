<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use JWTAuth;
use App\Repositories\User\UserRepository;
use Tymon\JWTAuth\Exceptions\JWTException;
use Hash;
use App\Transformers\UserTransformer;
use Dingo\Api\Routing\Helpers;
class UserController extends Controller
{
    use Helpers;
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */

    /**
     * @var userRepositoryInterface|\App\Repositories\Repository
     */
    private $userRepository;
    /**
     * @var UserTransformer
     */
    private $userTransformer;


    public function __construct(UserRepository $userRepository, UserTransformer $userTransformer)
    {
        $this->userRepository = $userRepository;
        $this->userTransformer = $userTransformer;

    }
    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function viewLogin(){

        return view('login');

    }
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        $token = null;
        return $this->userRepository->login($token,$credentials);

    }
    public function getAll(){

        $user=$this->userRepository->getAll();
        return $this->response->collection($user, new UserTransformer);
    }
    public function getUserInfo(Request $request){
        $userRepository = JWTAuth::toUser($request->token);
        return response()->json(['result' => $userRepository]);
    }
    public function show($id){
        $user=$this->userRepository->find($id);

        return $this->response->item($user, new UserTransformer);
    }
    public function update($id ,Request $request){
        $data=$request->all();
        $password=Hash::make($request->password);
        $data['password']= $password;
        $user=$this->userRepository->update($id,$data);
        return $this->response->item($user, new UserTransformer);
    }
    public function delete($id){
        $user=$this->userRepository->delete($id);
        return response()->json(['result' => $user]);
    }
}
