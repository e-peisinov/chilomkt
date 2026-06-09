<?php

use App\Livewire\Paginas\Inicio;
use App\Livewire\Paginas\Nosotros;
use App\Livewire\Paginas\Servicios;
use App\Livewire\Paginas\Contacto;
use App\Livewire\Admin\Panel;
use App\Livewire\Admin\PaginaInicio;
use App\Livewire\Admin\PaginaNosotros;
use App\Livewire\Admin\PaginaServicios;
use App\Livewire\Admin\PaginaContacto;
use App\Livewire\Admin\GestionConfiguraciones;
use App\Livewire\Admin\GestionMensajes;
use Illuminate\Support\Facades\Route;

// Paginas publicas
Route::get('/', Inicio::class)->name('inicio');
Route::get('/nosotros', Nosotros::class)->name('nosotros');
Route::get('/servicios', Servicios::class)->name('servicios');
Route::get('/contacto', Contacto::class)->name('contacto');

// Panel admin
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', Panel::class)->name('panel');
    Route::get('/pagina/inicio', PaginaInicio::class)->name('pagina.inicio');
    Route::get('/pagina/nosotros', PaginaNosotros::class)->name('pagina.nosotros');
    Route::get('/pagina/servicios', PaginaServicios::class)->name('pagina.servicios');
    Route::get('/pagina/contacto', PaginaContacto::class)->name('pagina.contacto');
    Route::get('/configuraciones', GestionConfiguraciones::class)->name('configuraciones');
    Route::get('/mensajes', GestionMensajes::class)->name('mensajes');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
