<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class FormController extends Controller
{
    protected function getBreadcrumb(string $label): array
    {
        return [
            ['label' => 'Dashboard', 'url' => '/dashboard'],
            ['label' => 'Form & Input', 'url' => '#'],
            ['label' => $label]
        ];
    }

    public function inputs(): View
    {
        return view('forms.inputs', [
            'title' => 'Input Dasar',
            'breadcrumb' => $this->getBreadcrumb('Input Dasar')
        ]);
    }

    public function controls(): View
    {
        return view('forms.controls', [
            'title' => 'Controls & Switches',
            'breadcrumb' => $this->getBreadcrumb('Controls & Switches')
        ]);
    }

    public function validation(): View
    {
        return view('forms.validation', [
            'title' => 'Validasi Form',
            'breadcrumb' => $this->getBreadcrumb('Validasi Form')
        ]);
    }

    public function upload(): View
    {
        return view('forms.upload', [
            'title' => 'File Upload',
            'breadcrumb' => $this->getBreadcrumb('File Upload')
        ]);
    }

    public function layout(): View
    {
        return view('forms.layout', [
            'title' => 'Form Layout',
            'breadcrumb' => $this->getBreadcrumb('Form Layout')
        ]);
    }

    public function advanced(): View
    {
        return view('forms.advanced', [
            'title' => 'Form Lanjutan',
            'breadcrumb' => $this->getBreadcrumb('Form Lanjutan')
        ]);
    }
}
