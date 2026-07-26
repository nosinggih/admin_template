<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function landing(): View
    {
        return view('pages.landing', [
            'title' => 'Selamat Datang'
        ]);
    }

    public function icons(): View
    {
        return view('pages.icons', [
            'title' => 'Ikon Tabler',
            'breadcrumb' => [
                ['label' => 'Dashboard', 'url' => '/dashboard'],
                ['label' => 'Aset Ikon']
            ]
        ]);
    }

    public function blank(): View
    {
        return view('pages.blank', [
            'title' => 'Halaman Kosong',
            'breadcrumb' => [
                ['label' => 'Dashboard', 'url' => '/dashboard'],
                ['label' => 'Halaman Kosong']
            ]
        ]);
    }
}
