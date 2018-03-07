<?php

namespace Bantenprov\AngkaMelekHuruf\Console\Commands;

use Illuminate\Console\Command;

/**
 * The AngkaMelekHurufCommand class.
 *
 * @package Bantenprov\AngkaMelekHuruf
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class AngkaMelekHurufCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:angka-melek-huruf';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\AngkaMelekHuruf package';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info('Welcome to command for Bantenprov\AngkaMelekHuruf package');
    }
}
