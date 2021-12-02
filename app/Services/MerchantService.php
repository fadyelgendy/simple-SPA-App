<?php

namespace App\Services;

use App\Jobs\createMerchantDatabase;
use App\Jobs\sendEmailToAdmin;
use App\Models\Merchant;
use Illuminate\Support\Facades\Validator;

class MerchantService
{
    protected $result;

    public function __construct()
    {
        $this->result = array();
    }

    public function store(array $data): array
    {
        $validator = Validator::make($data, [
            "merchant_name" => "required|unique:merchants",
            "trade_line" => 'required',
            'trade_type' => 'required'
        ]);

        if ($validator->fails()) {
            $this->result['success'] = 0;
            $this->result['errors'] = $validator->errors();
        } else {
            $merchant = new Merchant();
            $merchant->user_id = 0; // will be logged user
            $merchant->merchant_name = $data["merchant_name"];
            $merchant->trade_line = $data["trade_line"];
            $merchant->trade_type = $data['trade_type'];

            $merchant->save();

            // Create user database
            createMerchantDatabase::dispatch($merchant);

            $last = Merchant::where('merchant_name', $merchant->merchant_name)
                ->first();

            sendEmailToAdmin::dispatch($last);

            $this->result['success'] = 1;
            $this->result['message'] = "Merchant Data added successfully";
            $this->result['data'] = $last;
        }

        return $this->result;
    }

    public function list(): array
    {
        $results = Merchant::select('merchant_name as name', 'trade_line as line', 'trade_type as type')
            ->get();

        if ($results->count()) {
            return [
                'data' => $results
            ];
        }

        return ['data' => 'No records found!'];
    }
}
