<?php

namespace App\Observers\Errand;

use App\Models\ErrandTask;

class ErrandTaskObserver
{
    /**
     * Handle the ErrandTask "created" event.
     *
     * @param  \App\Models\ErrandTask  $errandTask
     * @return void
     */
    public function created(ErrandTask $errandTask)
    {
        //
    }

    /**
     * Handle the ErrandTask "updated" event.
     *
     * @param  \App\Models\ErrandTask  $errandTask
     * @return void
     */
    public function updated(ErrandTask $errandTask)
    {
        //
    }

    /**
     * Handle the ErrandTask "deleted" event.
     *
     * @param  \App\Models\ErrandTask  $errandTask
     * @return void
     */
    public function deleted(ErrandTask $errandTask)
    {
        //
    }

    /**
     * Handle the ErrandTask "restored" event.
     *
     * @param  \App\Models\ErrandTask  $errandTask
     * @return void
     */
    public function restored(ErrandTask $errandTask)
    {
        //
    }

    /**
     * Handle the ErrandTask "force deleted" event.
     *
     * @param  \App\Models\ErrandTask  $errandTask
     * @return void
     */
    public function forceDeleted(ErrandTask $errandTask)
    {
        //
    }
}
