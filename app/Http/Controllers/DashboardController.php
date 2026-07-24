<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard.index', [
            'title' => 'Dashboard Utama',
            'breadcrumb' => [
                ['label' => 'Dashboard', 'url' => '/dashboard'],
                ['label' => 'Utama']
            ]
        ]);
    }

    public function analytics(): View
    {
        return view('dashboard.analytics', [
            'title' => 'Analitik Konten',
            'breadcrumb' => [
                ['label' => 'Dashboard', 'url' => '/dashboard'],
                ['label' => 'Analitik']
            ]
        ]);
    }
}
