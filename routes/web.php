<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Livewire\Catalog;
use App\Http\Livewire\CatalogItem;
use App\Http\Livewire\WebhookConfirmation;
use App\Http\Livewire\Admin\Hosts\AllHosts;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Items\AllItems;
use App\Http\Livewire\Items;
use App\Http\Livewire\Hosts\HostPublicPage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hosts/{url}', HostPublicPage::class);
Route::get('/catalog', Catalog::class)->name('catalog');
Route::get('/catalog/item/{id}', CatalogItem::class);

Route::post('/webhook', WebhookConfirmation::class);

Route::get('/admin/hosts', AllHosts::class)->middleware(['auth:sanctum', 'verified', 'can:admin'])->name('admin.hosts');
Route::get('/admin/items', AllItems::class)->middleware(['auth:sanctum', 'verified', 'can:admin'])->name('admin.items');

Route::get('/items', Items::class)->middleware(['auth:sanctum', 'verified', 'can:admin']);

Route::get('/dashboard', Dashboard::class)->middleware(['auth:sanctum', 'verified'])->name('dashboard');
