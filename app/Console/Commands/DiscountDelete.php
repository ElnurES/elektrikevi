<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class DiscountDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'discount:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Endirimli qiymetleri silmek ucundur';

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

            Product::where('discount', '=', 1)
                ->where('discount_date','<',now())
                ->update([
                    'discount'=>0
                ]);

    }
}
