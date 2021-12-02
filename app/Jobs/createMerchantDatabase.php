<?php

namespace App\Jobs;

use App\Models\Merchant;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class createMerchantDatabase implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $merchant;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Merchant $merchant)
    {
        $this->merchant = $merchant;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $token = Str::random(4);
        $dbname = explode(" ", $this->merchant->merchant_name)[0] . $token;

        // Create new database
        DB::connection(env('DB_CONNECTION'))
            ->statement("CREATE DATABASE `".$dbname."`");

        // Get created merchant
        $merchant = Merchant::select('id')
            ->where('merchant_name', $this->merchant->merchant_name)
            ->first();

        //insert record into users_databases table
        $date = Carbon::now();
        DB::connection(env('DB_CONNECTION'))
            ->statement("INSERT INTO `users_databases`(user_id, database_name, created_at, updated_at)
                VALUES ('" . $merchant->id . "', '" . $dbname . "', '". $date ."', '" .$date. "')");
    }
}
