<?php

namespace App\Commands\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use function Termwind\render;
use function Laravel\Prompts\text;
use function Laravel\Prompts\select;

trait Prompts
{
    protected function getDomain()
    {
        $domains = $this->getAvailableDomains();
        return $domains
            ? $this->getArgumentOrSelect('domain', 'Domain:', $domains)
            : $this->getArgumentOrText('domain', 'Domain:');
    }

    protected function getAvailableDomains()
    {
        $this->ensureSourceDirectoryExists();

        $domains = [];
        foreach(File::directories('src/') as $directory) {
            if(File::exists("$directory/ServiceProvider.php")) {
                $domains[] = $directory;
            }
            foreach(File::directories($directory) as $subdirectory) {
                if(File::exists("$subdirectory/ServiceProvider.php")) {
                    $domains[] = $subdirectory;
                }
            }
        }

        return array_map(fn($domain) => Str::replace('src/', '', $domain), $domains);
    }

    protected function ensureSourceDirectoryExists(): void
    {
        if(!File::exists('src/')) {
            render(<<<"HTML"
                <div class="py-1 ml-2">
                    <div class="px-1 bg-red-500 text-gray-300">ERROR</div>
                    <em class="ml-1">
                      Source directory (src/) does not exist.
                    </em>
                </div>
            HTML);
            die();
        }
    }

    protected function getFileName()
    {
        return $this->getArgumentOrText('name', 'Class Name:');
    }

    protected function getArgumentOrText($slug, $label)
    {
        return $this->argument($slug) ?? text(
            label: $label,
            required: true
        );
    }

    protected function getArgumentOrSelect($slug, $prompt, array $options)
    {
        return $this->argument($slug) ?? select($prompt, $options);
    }
}
