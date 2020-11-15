<?php

namespace App\Observers\Rydecoin;

use App\Models\RydecoinPackage;

class RydecoinPackageObserver
{
    /**
     * Handle the RydecoinPackage "created" event.
     *
     * @param  \App\Models\RydecoinPackage  $rydecoinPackage
     * @return void
     */
    public function created(RydecoinPackage $rydecoinPackage)
    {
        //
    }

    /**
     * Handle the RydecoinPackage "updated" event.
     *
     * @param  \App\Models\RydecoinPackage  $rydecoinPackage
     * @return void
     */
    public function updated(RydecoinPackage $rydecoinPackage)
    {
        //
    }

    /**
     * Handle the RydecoinPackage "deleted" event.
     *
     * @param  \App\Models\RydecoinPackage  $rydecoinPackage
     * @return void
     */
    public function deleted(RydecoinPackage $rydecoinPackage)
    {
        //
    }

    /**
     * Handle the RydecoinPackage "restored" event.
     *
     * @param  \App\Models\RydecoinPackage  $rydecoinPackage
     * @return void
     */
    public function restored(RydecoinPackage $rydecoinPackage)
    {
        //
    }

    /**
     * Handle the RydecoinPackage "force deleted" event.
     *
     * @param  \App\Models\RydecoinPackage  $rydecoinPackage
     * @return void
     */
    public function forceDeleted(RydecoinPackage $rydecoinPackage)
    {
        //
    }
}
