<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Observers\User\UserObserver;
use App\Observers\Vehicle\VehicleObserver;
use App\Observers\Address\AddressObserver;
use App\Observers\Bank\BankDetailObserver;
use App\Observers\Cart\CartObserver;
use App\Observers\Errand\ErrandObserver;
use App\Observers\Errand\ErrandTaskObserver;
use App\Observers\Inventory\InventoryObserver;
use App\Observers\LocalDispatch\LocalDispatchObserver;
use App\Observers\MobileTransaction\MobileTransactionObserver;
use App\Observers\Order\OrderObserver;
use App\Observers\Payment\PaymentObserver;
use App\Observers\RequestVan\RequestVanObserver;
use App\Observers\RydecoinPackage\RydecoinPackageObserver;
use App\Observers\ServiceRate\ServiceRateObserver;
use App\Observers\Wallet\WalletObserver;
use App\Models\Vehicle;
use App\Models\User;
use App\Models\Address;
use App\Models\BankDetail;
use App\Models\Cart;
use App\Models\Errand;
use App\Models\ErrandTask;
use App\Models\Inventory;
use App\Models\LocalDispatch;
use App\Models\MobileTransaction;
use App\Models\Order;
use App\Models\Payment;
use App\Models\RequestVan;
use App\Models\RydecoinPackage;
use App\Models\ServiceRate;
use App\Models\Wallet;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Vehicle::observe(VehicleObserver::class);
        Address::observe(AddressObserver::class);
        BankDetail::observe(BankDetailObserver::class);
        Cart::observe(CartObserver::class);
        Errand::observe(ErrandObserver::class);
        ErrandTask::observe(ErrandTaskObserver::class);
        Inventory::observe(InventoryObserver::class);
        LocalDispatch::observe(LocalDispatchObserver::class);
        MobileTransaction::observe(MobileTransactionObserver::class);
        Order::observe(OrderObserver::class);
        Payment::observe(PaymentObserver::class);
        RequestVan::observe(RequestVanObserver::class);
        RydecoinPackage::observe(RydecoinPackageVanObserver::class);
        ServiceRate::observe(ServiceRateObserver::class);
        Wallet::observe(WalletObserver::class);
    }
}
