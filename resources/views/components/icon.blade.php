@props(['name', 'type' => 'outline', 'class' => ''])

@php
    $iconPath = base_path("node_modules/@tabler/icons/icons/{$type}/{$name}.svg");
    if (!file_exists($iconPath)) {
        $iconPath = base_path("node_modules/@tabler/icons/icons/outline/{$name}.svg");
    }
    if (!file_exists($iconPath)) {
        $iconPath = base_path("node_modules/@tabler/icons/icons/{$name}.svg");
    }

    if (file_exists($iconPath)) {
        $svg = file_get_contents($iconPath);
        if (!empty($class)) {
            $svg = str_replace('<svg', '<svg class="' . e($class) . '"', $svg);
        }
        echo $svg;
    } else {
        echo "<!-- icon {$name} not found -->";
    }
@endphp
