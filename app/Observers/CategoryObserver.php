<?php

namespace App\Observers;
use Illuminate\Support\Facades\Storage;

use App\Models\Category;

class CategoryObserver
{
    /**
     * Handle the task "created" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        Storage::append('public/category.log', 'Create:='.$category);
    }

    /**
     * Handle the task "updated" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        Storage::append('public/category.log', 'Update:'.$category);
    }

    /**
     * Handle the task "deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        Storage::append('public/category.log', 'Delete:id=>'.$category->id);
    }

    /**
     * Handle the task "restored" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the task "force deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }


}
