<?php

namespace App\Services;

class NavigationService
{
    public function getItems(): array
    {
        $items = config('navigation', []);

        return array_map(function ($item) {
            return $this->processItem($item);
        }, $items);
    }

    protected function processItem(array $item): array
    {
        $active = false;

        if (isset($item['children'])) {
            $item['children'] = array_map(function ($child) use (&$active) {
                // If url is /, match request()->is('/')
                $url = trim($child['url'], '/');
                $childActive = empty($url) ? request()->is('/') : request()->is($url);
                $child['active'] = $childActive;
                if ($childActive) {
                    $active = true;
                }
                return $child;
            }, $item['children']);
        } else {
            $url = trim($item['url'], '/');
            $active = empty($url) ? request()->is('/') : request()->is($url);
        }

        $item['active'] = $active;
        return $item;
    }
}
