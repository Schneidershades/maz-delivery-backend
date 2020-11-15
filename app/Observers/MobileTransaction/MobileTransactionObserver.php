<?php

namespace App\Observers\MobileTransaction;

use App\Models\MobileTransaction;

class MobileTransactionObserver
{
    /**
     * Handle the MobileTransaction "created" event.
     *
     * @param  \App\Models\MobileTransaction  $mobileTransaction
     * @return void
     */
    public function created(MobileTransaction $mobileTransaction)
    {
        //
    }

    /**
     * Handle the MobileTransaction "updated" event.
     *
     * @param  \App\Models\MobileTransaction  $mobileTransaction
     * @return void
     */
    public function updated(MobileTransaction $mobileTransaction)
    {
        //
    }

    /**
     * Handle the MobileTransaction "deleted" event.
     *
     * @param  \App\Models\MobileTransaction  $mobileTransaction
     * @return void
     */
    public function deleted(MobileTransaction $mobileTransaction)
    {
        //
    }

    /**
     * Handle the MobileTransaction "restored" event.
     *
     * @param  \App\Models\MobileTransaction  $mobileTransaction
     * @return void
     */
    public function restored(MobileTransaction $mobileTransaction)
    {
        //
    }

    /**
     * Handle the MobileTransaction "force deleted" event.
     *
     * @param  \App\Models\MobileTransaction  $mobileTransaction
     * @return void
     */
    public function forceDeleted(MobileTransaction $mobileTransaction)
    {
        //
    }
}
