<?php

namespace App\Observers\ServiceRate;

use App\Models\ServiceRate;

class ServiceRateObserver
{
    /**
     * Handle the ServiceRate "created" event.
     *
     * @param  \App\Models\ServiceRate  $serviceRate
     * @return void
     */
    public function created(ServiceRate $serviceRate)
    {
        //
    }

    /**
     * Handle the ServiceRate "updated" event.
     *
     * @param  \App\Models\ServiceRate  $serviceRate
     * @return void
     */
    public function updated(ServiceRate $serviceRate)
    {
        //
    }

    /**
     * Handle the ServiceRate "deleted" event.
     *
     * @param  \App\Models\ServiceRate  $serviceRate
     * @return void
     */
    public function deleted(ServiceRate $serviceRate)
    {
        //
    }

    /**
     * Handle the ServiceRate "restored" event.
     *
     * @param  \App\Models\ServiceRate  $serviceRate
     * @return void
     */
    public function restored(ServiceRate $serviceRate)
    {
        //
    }

    /**
     * Handle the ServiceRate "force deleted" event.
     *
     * @param  \App\Models\ServiceRate  $serviceRate
     * @return void
     */
    public function forceDeleted(ServiceRate $serviceRate)
    {
        //
    }
}
