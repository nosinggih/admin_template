<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ComponentController extends Controller
{
    protected function getBreadcrumb(string $label): array
    {
        return [
            ['label' => 'Dashboard', 'url' => '/dashboard'],
            ['label' => 'Komponen UI', 'url' => '#'],
            ['label' => $label]
        ];
    }

    public function buttons(): View
    {
        return view('components-showcase.buttons', [
            'title' => 'Buttons & Dropdowns',
            'breadcrumb' => $this->getBreadcrumb('Buttons & Dropdowns')
        ]);
    }

    public function alerts(): View
    {
        return view('components-showcase.alerts', [
            'title' => 'Alerts & Badges',
            'breadcrumb' => $this->getBreadcrumb('Alerts & Badges')
        ]);
    }

    public function cards(): View
    {
        return view('components-showcase.cards', [
            'title' => 'Cards & Stat Cards',
            'breadcrumb' => $this->getBreadcrumb('Cards & Stat Cards')
        ]);
    }

    public function avatars(): View
    {
        return view('components-showcase.avatars', [
            'title' => 'Avatars Showcase',
            'breadcrumb' => $this->getBreadcrumb('Avatars')
        ]);
    }

    public function modals(): View
    {
        return view('components-showcase.modals', [
            'title' => 'Modals & Offcanvas',
            'breadcrumb' => $this->getBreadcrumb('Modals & Offcanvas')
        ]);
    }

    public function navigation(): View
    {
        return view('components-showcase.navigation', [
            'title' => 'Tabs & Accordions',
            'breadcrumb' => $this->getBreadcrumb('Tabs & Accordion')
        ]);
    }

    public function progress(): View
    {
        return view('components-showcase.progress', [
            'title' => 'Progress & Skeletons',
            'breadcrumb' => $this->getBreadcrumb('Progress & Skeleton')
        ]);
    }

    public function overlays(): View
    {
        return view('components-showcase.overlays', [
            'title' => 'Tooltips & Popovers',
            'breadcrumb' => $this->getBreadcrumb('Tooltips & Popovers')
        ]);
    }

    public function lists(): View
    {
        return view('components-showcase.lists', [
            'title' => 'Lists & Timelines',
            'breadcrumb' => $this->getBreadcrumb('List & Timeline')
        ]);
    }

    public function empty(): View
    {
        return view('components-showcase.empty', [
            'title' => 'Empty States',
            'breadcrumb' => $this->getBreadcrumb('Empty State')
        ]);
    }

    public function datatables(): View
    {
        return view('components-showcase.datatables', [
            'title' => 'Datatables Lanjutan',
            'breadcrumb' => [
                ['label' => 'Dashboard', 'url' => '/dashboard'],
                ['label' => 'Tampilan Data', 'url' => '#'],
                ['label' => 'Datatables Lanjutan']
            ]
        ]);
    }
}
