<?php

namespace Digitlimit\Flag\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\File;

class Generator extends Command
{
    protected $signature = 'flag:generate-blades
                            {--source= : Path to the folder containing SVG files}
                            {--destination= : Path to the Blade components output folder}';

    protected $description = 'Generate Blade components from SVG flag files';

    /**
     * @throws FileNotFoundException
     */
    public function handle(): int
    {
        $source = $this->option('source')
            ?? base_path('resources/flags');

        $destination = $this->option('destination')
            ?? base_path('resources/views/components/flag');

        if (!File::exists($source)) {
            $this->error("❌ Source folder does not exist: {$source}");
            return 1;
        }

        File::ensureDirectoryExists($destination);

        $svgFiles = File::files($source);
        if (empty($svgFiles)) {
            $this->warn("⚠️ No SVG files found in: {$source}");
            return 0;
        }

        foreach ($svgFiles as $file) {
            $countryCode = strtolower($file->getFilenameWithoutExtension());
            $bladePath = "{$destination}/{$countryCode}.blade.php";

            File::put($bladePath, File::get($file));

            $this->line("✅ Generated Blade for <x-flag-{$countryCode}>");
        }

        $this->info("🎉 All flag components generated to: {$destination}");
        return 0;
    }
}
