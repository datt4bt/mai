<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Task;
use App\Repositories\Task\TaskRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Task\TaskRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Http\Requests\Task\TaskStoreRequest;
use App\Http\Requests\Task\InsertTaskRequest;
use Validator;
class TaskController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */

         /**
     * @var taskRepositoryInterface|\App\Repositories\Repository
     */
    protected $userRepository;
    protected $taskRepository;
    protected $categoryRepository;

    public function __construct(TaskRepositoryInterface $taskRepository,CategoryRepositoryInterface $categoryRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Show all post
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $id = Auth::id();
        $arrayTask = $this->taskRepository->getOne($id);
        return view('task.viewAll', compact('arrayTask'));
    }

    public function insert()
    {

        $arrayCategory = $this->categoryRepository->getAll();
        return view('task.insert', compact('arrayCategory'));
    }

    public function processInsert(InsertTaskRequest $request)
    {   $id = Auth::id();
        $data = $request->all();
        $data['id_user']=$id;
        $idUser=$request->id_user;
        $idCategory=$request->id_category;
        //... Validation here
        $this->taskRepository->create($data);
        return redirect()->route('task.getAll');
    }

    public function update($id)
    {
        $idUser = Auth::id();
        $task = $this->taskRepository->find($id);
        $arrayCategory = $this->categoryRepository->getAll();
        return view('task.update', compact('task','arrayCategory'));

    }

    public function processUpdate(TaskStoreRequest $request, $id)
    {
        //... Validation here
        $request->validated();
        $data = $request->all();
        $this->taskRepository->update($id, $data);
        return redirect()->route('task.getAll');

    }
    public function updateStatus(Request $request)
    {
        try {
            $id=$request->id;
            $task = $this->taskRepository->findOrFail($id);

        } catch (\Exception $e) {
            return response()->json(["success" => false, 'message' => $e->getMessage()], 400);
        }
        $data['status'] = $request->status;

        $this->taskRepository->update($id, $data);
        return response()->json(['success' => '']);
    }

    public function delete(Request $request)
    {
        try {
            $id = $request->id;
            $task = $this->taskRepository->findOrFail($id);

        } catch (\Exception $e) {
            return response()->json(["success" => false, 'message' => $e->getMessage()], 400);
        }
        $task->delete();
        return response()->json(['success' => '']);


    }
}
