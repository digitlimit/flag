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
        $source = $this->option('source');
        $destination = $this->option('destination');

        if (empty($source)) {
            $this->error('Provide a source folder using the --source option');
            return 1;
        }

        if (empty($destination)) {
            $this->error('Provide a destination folder using the --destination option');
            return 1;
        }

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

            $svg = File::get($file);

            // Inject class binding into the <svg> tag if not already present
            if (preg_match('/<svg[^>]*>/', $svg, $matches)) {
                $originalTag = $matches[0];

                // Only inject if no class attribute present
                if (!str_contains($originalTag, 'class=')) {
                    $replacementTag = str_replace(
                        '<svg',
                        '<svg {{ $attributes->merge([\'class\' => \'\']) }}',
                        $originalTag
                    );

                    // Replace the original tag with the modified one
                    $svg = str_replace($originalTag, $replacementTag, $svg);
                }
            }

            File::put($bladePath, $svg);

            $this->line("✅ Generated Blade for <x-flag-{$countryCode}>");
        }

        $this->info("🎉 All flag components generated to: {$destination}");
        return 0;
    }
}
