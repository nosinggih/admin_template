<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    protected function getBreadcrumb(string $label): array
    {
        return [
            ['label' => 'Dashboard', 'url' => '/dashboard'],
            ['label' => 'Pengguna', 'url' => '#'],
            ['label' => $label]
        ];
    }

    public function index(): View
    {
        return view('users.list', [
            'title' => 'Daftar Pengguna',
            'breadcrumb' => $this->getBreadcrumb('Daftar Pengguna')
        ]);
    }

    public function create(): View
    {
        return view('users.form', [
            'title' => 'Tambah Pengguna Baru',
            'breadcrumb' => $this->getBreadcrumb('Tambah / Edit Pengguna')
        ]);
    }

    public function show($user): View
    {
        return view('users.detail', [
            'title' => 'Detail Profil Pengguna',
            'breadcrumb' => $this->getBreadcrumb('Detail Profil')
        ]);
    }
}
