<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        SitemapGenerator::create(config('app.url'))
           ->getSitemap()
           ->add(Url::create('productos')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.1))

            ->add('/')
            ->add('nosotros')
            ->add('unidades/auri-innova')
            ->add('unidades/auri-manofactura')
            ->add('unidades/auri-store')
            ->add('contacto')

            ->writeToFile(public_path('sitemap.xml'));
        // SitemapGenerator::create('https://auri.com.pe')
        //     ->writeToFile(public_path('sitemap.xml'));
    }
}
