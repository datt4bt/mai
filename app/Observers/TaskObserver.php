<?php

namespace App\Observers;
use Illuminate\Support\Facades\Storage;

use App\Models\Task;

class TaskObserver
{
    /**
     * Handle the task "created" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function created(Task $task)
    {
        Storage::append('public/task.log', 'Create:id=>'.$task->id.',name=>'.$task->name.',Description=>'.$task->description.',Category Id=>'.$task->id_category);
    }

    /**
     * Handle the task "updated" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function updated(Task $task)
    {
        Storage::append('public/task.log', 'Update:id=>'.$task->id.',name=>'.$task->name.',Description=>'.$task->description.',Category Id=>'.$task->id_category);
    }

    /**
     * Handle the task "deleted" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function deleted(Task $task)
    {
        Storage::append('public/task.log', 'Delete:id=>'.$task->id);
    }

    /**
     * Handle the task "restored" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function restored(Task $task)
    {
        //
    }

    /**
     * Handle the task "force deleted" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     */
    public function forceDeleted(Task $task)
    {
        //
    }


}
