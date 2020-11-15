<?php

namespace App\Observers\Bank;

use App\Models\BankDetail;

class BankDetailObserver
{
    public function creating(BankDetail $bankDetail)
    {
        $bankDetail->user_id = auth()->user()->id;
    }

    public function updating(BankDetail $bankDetail)
    {
        $bankDetail->user_id = auth()->user()->id;
    }

    /**
     * Handle the BankDetail "created" event.
     *
     * @param  \App\Models\BankDetail  $bankDetail
     * @return void
     */
    public function created(BankDetail $bankDetail)
    {
        //
    }

    /**
     * Handle the BankDetail "updated" event.
     *
     * @param  \App\Models\BankDetail  $bankDetail
     * @return void
     */
    public function updated(BankDetail $bankDetail)
    {
        //
    }

    /**
     * Handle the BankDetail "deleted" event.
     *
     * @param  \App\Models\BankDetail  $bankDetail
     * @return void
     */
    public function deleted(BankDetail $bankDetail)
    {
        //
    }

    /**
     * Handle the BankDetail "restored" event.
     *
     * @param  \App\Models\BankDetail  $bankDetail
     * @return void
     */
    public function restored(BankDetail $bankDetail)
    {
        //
    }

    /**
     * Handle the BankDetail "force deleted" event.
     *
     * @param  \App\Models\BankDetail  $bankDetail
     * @return void
     */
    public function forceDeleted(BankDetail $bankDetail)
    {
        //
    }
}
