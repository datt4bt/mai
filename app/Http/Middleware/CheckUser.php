<?php

namespace App\Http\Middleware;
use App\Models\Task;
use Illuminate\Http\Response;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $task_id = $request->route('id');
        $task=Task::where('id',$task_id)->value('id_user');
        $user = Auth::id();
        if ($task==$user)
        {
            return $next($request);
        }
        return redirect()->route('task.getAll')->with("error_update",'You do not have access at Task Id='.$task_id);
    }
}
