<?php

namespace App\Mail;

use App\Models\Merchant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newMerchant extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $merchant;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Merchant $merchant)
    {
       $this->merchant = $merchant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.new_merchant')
            ->with([
                'merchant_name' => $this->merchant->merchant_name,
                'trade_type' => $this->merchant->trade_type,
                'trade_line' => $this->merchant->trade_line,
                'created_at' => $this->merchant->created_at,
            ]);
    }
}
