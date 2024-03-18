<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\PaymentReminderEmailJob;

class PaymentReminderController extends Controller
{
    public function enqueue(Request $request)
    {
        $details = ['email' => 'avinash.seth@outlook.com', 'name'=>'Avinash Seth', 'amount'=>rand(1000,9999)];
        PaymentReminderEmailJob::dispatch($details);
    }
}