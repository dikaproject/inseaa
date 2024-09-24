<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Contact;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Compose the admin header view
        View::composer('admin.components.header', function ($view) {
            $unreadContacts = Contact::whereNull('read_at')->orderBy('created_at', 'desc')->get();
            $view->with('unreadContacts', $unreadContacts);
        });
    }
}
