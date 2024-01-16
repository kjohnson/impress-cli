<?php

namespace App\Commands\Traits;

use Illuminate\Support\Facades\Storage;

trait ComposerConfig
{
    public function getNamespace(): string
    {
        return $this->getNamespaceForDirectory('src/');
    }

    public function getNamespaceForDirectory(string $directory): string
    {
        $composer = Storage::build([
            'driver' => 'local',
            'root' => getcwd(),
        ])->get('composer.json');

        $config = json_decode($composer, true);
        $directories = array_flip($config['autoload']['psr-4']);
        return rtrim($directories[$directory], '\\');
    }
}
