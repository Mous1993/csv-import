<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\ArticlesImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:articles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Csv file articles to the database';
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
        Excel::import(new ArticlesImport, storage_path('articles.csv'));
    }
}
