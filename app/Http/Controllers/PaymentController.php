<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function upgrade()
    {
        return view('payments.upgrade');
    }

    public function process(Request $request)
    {
        return back()->with('success', 'Pago procesado');
    }
}
