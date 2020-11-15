<?php

namespace App\Observers\LocalDispatch;

use App\Models\LocalDispatch;

class LocalDispatchObserver
{
    /**
     * Handle the LocalDispatch "created" event.
     *
     * @param  \App\Models\LocalDispatch  $localDispatch
     * @return void
     */
    public function created(LocalDispatch $localDispatch)
    {
        //
    }

    /**
     * Handle the LocalDispatch "updated" event.
     *
     * @param  \App\Models\LocalDispatch  $localDispatch
     * @return void
     */
    public function updated(LocalDispatch $localDispatch)
    {
        //
    }

    /**
     * Handle the LocalDispatch "deleted" event.
     *
     * @param  \App\Models\LocalDispatch  $localDispatch
     * @return void
     */
    public function deleted(LocalDispatch $localDispatch)
    {
        //
    }

    /**
     * Handle the LocalDispatch "restored" event.
     *
     * @param  \App\Models\LocalDispatch  $localDispatch
     * @return void
     */
    public function restored(LocalDispatch $localDispatch)
    {
        //
    }

    /**
     * Handle the LocalDispatch "force deleted" event.
     *
     * @param  \App\Models\LocalDispatch  $localDispatch
     * @return void
     */
    public function forceDeleted(LocalDispatch $localDispatch)
    {
        //
    }
}
