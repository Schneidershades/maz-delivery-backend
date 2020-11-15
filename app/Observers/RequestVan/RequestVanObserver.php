<?php

namespace App\Observers\RequestVan;

use App\Models\RequestVan;

class RequestVanObserver
{
    /**
     * Handle the RequestVan "created" event.
     *
     * @param  \App\Models\RequestVan  $requestVan
     * @return void
     */
    public function created(RequestVan $requestVan)
    {
        //
    }

    /**
     * Handle the RequestVan "updated" event.
     *
     * @param  \App\Models\RequestVan  $requestVan
     * @return void
     */
    public function updated(RequestVan $requestVan)
    {
        //
    }

    /**
     * Handle the RequestVan "deleted" event.
     *
     * @param  \App\Models\RequestVan  $requestVan
     * @return void
     */
    public function deleted(RequestVan $requestVan)
    {
        //
    }

    /**
     * Handle the RequestVan "restored" event.
     *
     * @param  \App\Models\RequestVan  $requestVan
     * @return void
     */
    public function restored(RequestVan $requestVan)
    {
        //
    }

    /**
     * Handle the RequestVan "force deleted" event.
     *
     * @param  \App\Models\RequestVan  $requestVan
     * @return void
     */
    public function forceDeleted(RequestVan $requestVan)
    {
        //
    }
}
