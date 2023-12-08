<?php

namespace App\Commands\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use LaravelZero\Framework\Commands\Command;

use function Termwind\render;
use function Laravel\Prompts\text;
use function Laravel\Prompts\select;

trait Prompts
{
    protected function getDomain()
    {
        return $this->getArgumentOrSelect('domain', 'Domain:', ['Member', 'Contributor', 'Owner']);
    }

    protected function getFileName()
    {
        return $this->getArgumentOrText('name', 'Name:');
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
        return $this->argument('domain') ?? select($prompt, $options);
    }
}
