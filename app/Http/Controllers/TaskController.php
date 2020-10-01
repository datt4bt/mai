<?php

namespace App\Http\Controllers;

use App\Exceptions\RenderException;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Task;
use App\Repositories\Task\TaskRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Task\TaskRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Http\Resources\Task as TaskResource;
use App\Http\Requests\Task\TaskStoreRequest;
use App\Http\Requests\Task\InsertTaskRequest;
use Validator;

class TaskController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param int $id
     * @return View
     */

    /**
     * @var taskRepositoryInterface|\App\Repositories\Repository
     */
    protected $userRepository;
    protected $taskRepository;
    protected $categoryRepository;

    public function __construct(TaskRepositoryInterface $taskRepository, CategoryRepositoryInterface $categoryRepository)
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
        $tasks = $this->taskRepository->getOne($id);
        return TaskResource::collection($tasks);

    }

    public function show()
    {
        try {
            $id = Auth::id();
            $this->taskRepository->findUser($id);
        } catch (\Exception $exception) {
            throw  new  RenderException($exception->getMessage());
        }
        $tasks = $this->taskRepository->show($id);
        return TaskResource::collection($tasks);
    }

    public function insert()
    {
        try {
            $id = Auth::id();
            $this->taskRepository->findUser($id);

        } catch (\Exception $exception) {
            throw  new  RenderException($exception->getMessage());
        }
        $categorys = $this->categoryRepository->getAll();
        return view('task.insert', compact('categorys'));
    }

    public function processInsert(InsertTaskRequest $request)
    {
        $id = Auth::id();
        $data = $request->all();
        $data['id_user'] = $id;
        $task = $this->taskRepository->create($data);
        return new TaskResource($task);
    }

    public function update($id)
    {
        $task = $this->taskRepository->find($id);
        $categorys = $this->categoryRepository->getAll();
        return view('task.update', compact('task', 'categorys'));
    }

    public function processUpdate(TaskStoreRequest $request, $id)
    {
        //... Validation here
        $request->validated();
        $data = $request->all();
        $task = $this->taskRepository->update($id, $data);
        return new TaskResource($task);
    }

//    public function updateStatus(Request $request)
//    {
//        try {
//            $id = $request->id;
//            $task = $this->taskRepository->findOrFail($id);
//
//        } catch (\Exception $e) {
//            return response()->json(["success" => false, 'message' => $e->getMessage()], 400);
//        }
//        $data['status'] = $request->status;
//
//        $this->taskRepository->update($id, $data);
//        return response()->json(['success' => '']);
//    }

//    public function updateStatusAll(Request $request)
//    {
//
//        if (isset($request->page)) {
//            $currentPage = $request->page;
//            \Illuminate\Pagination\Paginator::currentPageResolver(function () use ($currentPage) {
//                return $currentPage;
//            });
//        }
//        $data = $request->check;
//        $ids = $request->ids;
//        $this->taskRepository->updateStatus($ids, $data);
//        return redirect()->route('task.getAll');
//
//
//    }

    public function delete($id)
    {
        $task = $this->taskRepository->delete($id);
        return response()->json(['result' => $task]);
//        try {
//            $id = $request->id;
//            $task = $this->taskRepository->findOrFail($id);
//
//        } catch (\Exception $e) {
//            return response()->json(["success" => false, 'message' => $e->getMessage()], 400);
//        }
//        $task->delete();
//        return response()->json(['success' => '']);


    }
}
