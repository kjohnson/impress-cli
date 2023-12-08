<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use LaravelZero\Framework\Commands\Command;

use function Termwind\render;

class ControllerCommand extends Command
{
    use Traits\Prompts;
    use Traits\Stubs;

    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'make:controller {domain?} {name?}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Create a new Controller class';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $domain = $this->getDomain();
        $name = $this->getFileName();
        $path = "src/$domain/Controllers/$name.php";

        $this->makeFileFromStub(
            stub: 'controller',
            domain: $domain,
            name: $name,
            path: $path,
        );

        render(<<<"HTML"
            <div class="py-1 ml-2">
                <div class="px-1 bg-green-300 text-gray-500">INFO</div>
                <em class="ml-1">
                  $domain Controller <strong>[$path]</strong> created successfully.
                </em>
            </div>
        HTML);
    }
}
