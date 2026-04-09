<?php

namespace App\Console\Commands;

use App\Servces\SiteMapService;
use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the XML sitemap';

    public function handle()
    {
        SiteMapService::generate();
        $this->info('Sitemap generated successfully.');
    }
}
