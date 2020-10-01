<?php

namespace App\Observers;
use Illuminate\Support\Facades\Storage;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the task "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        Storage::append('public/user.log', 'Create:id=>'.$user->id.',email=>'.$user->email.',name=>'.$user->name);
    }

    /**
     * Handle the task "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        Storage::append('public/user.log', 'Update:id=>'.$user->id.',email=>'.$user->email.',name=>'.$user->name);
    }

    /**
     * Handle the task "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        Storage::append('public/user.log', 'Delete:id=>'.$user->id);
    }

    /**
     * Handle the task "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the task "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }


}
