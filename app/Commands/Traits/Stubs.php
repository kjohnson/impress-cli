<?php

namespace App\Commands\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use LaravelZero\Framework\Commands\Command;

trait Stubs
{
    public function makeFileFromStub($stub, $path, $domain = '', $name = null, $namespace = 'Give')
    {
        $contents = Str::of(File::get(dirname( dirname(__FILE__) )."/stubs/$stub.stub"))
            ->replace('__NAMESPACE__', $namespace)
            ->replace('__DOMAIN__', Str::of($domain)->replace('/', '\\'))
            ->replace('__NAME__', $name);

        Storage::build([
            'driver' => 'local',
            'root' => getcwd(),
        ])->put($path, $contents);
    }
}
