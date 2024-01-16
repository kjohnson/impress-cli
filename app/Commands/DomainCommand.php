<?php

namespace App\Commands;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use LaravelZero\Framework\Commands\Command;

use function Termwind\render;

class DomainCommand extends Command
{
    use Traits\ComposerConfig;
    use Traits\Prompts;
    use Traits\Stubs;

    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'make:domain {domain?}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Create a new Domain directory';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $domain = $this->getArgumentOrText('domain', 'Domain:');
        $dir = "src/$domain";
        $path = "$dir/ServiceProvider.php";

        $this->makeFileFromStub(
            stub: 'service-provider',
            domain: $domain,
            path: $path,
            namespace: $this->getNamespace(),
        );

        render(<<<"HTML"
            <div class="py-1 ml-2">
                <div class="px-1 bg-green-300 text-gray-500">INFO</div>
                <em class="ml-1">
                  Domain $domain <strong>[$dir]</strong> created successfully.
                </em>
            </div>
        HTML);
    }
}
