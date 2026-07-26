<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class TableController extends Controller
{
    protected function getBreadcrumb(string $label): array
    {
        return [
            ['label' => 'Dashboard', 'url' => '/dashboard'],
            ['label' => 'Tampilan Data', 'url' => '#'],
            ['label' => $label]
        ];
    }

    public function basic(): View
    {
        return view('tables.basic', [
            'title' => 'Tabel Dasar',
            'breadcrumb' => $this->getBreadcrumb('Tabel Dasar')
        ]);
    }

    public function interactive(): View
    {
        return view('tables.interactive', [
            'title' => 'Tabel Interaktif',
            'breadcrumb' => $this->getBreadcrumb('Tabel Interaktif')
        ]);
    }

    public function stats(): View
    {
        return view('tables.stats', [
            'title' => 'Statistik & Ringkasan',
            'breadcrumb' => $this->getBreadcrumb('Tabel Statistik')
        ]);
    }
}
