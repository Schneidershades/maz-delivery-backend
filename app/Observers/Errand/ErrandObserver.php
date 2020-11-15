<?php

namespace App\Observers\Errand;

use App\Models\Errand;

class ErrandObserver
{
    /**
     * Handle the Errand "created" event.
     *
     * @param  \App\Models\Errand  $errand
     * @return void
     */
    public function created(Errand $errand)
    {
        //
    }

    /**
     * Handle the Errand "updated" event.
     *
     * @param  \App\Models\Errand  $errand
     * @return void
     */
    public function updated(Errand $errand)
    {
        //
    }

    /**
     * Handle the Errand "deleted" event.
     *
     * @param  \App\Models\Errand  $errand
     * @return void
     */
    public function deleted(Errand $errand)
    {
        //
    }

    /**
     * Handle the Errand "restored" event.
     *
     * @param  \App\Models\Errand  $errand
     * @return void
     */
    public function restored(Errand $errand)
    {
        //
    }

    /**
     * Handle the Errand "force deleted" event.
     *
     * @param  \App\Models\Errand  $errand
     * @return void
     */
    public function forceDeleted(Errand $errand)
    {
        //
    }
}
