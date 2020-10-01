<?php

namespace App\Http\Middleware;

use App\Exceptions\RenderException;
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
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = Auth::id();
            $task_id = $request->route('id');
            Task::where('id', $task_id)->where('id_user', $user)->firstOrFail();

        } catch (\Exception $exception) {
            throw  new  RenderException($exception->getMessage());
        }
        return $next($request);
    }
}
