<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\Account;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $transactionCount = Transaction::count();
        $accountCount = Account::count();
    
        return view('index', compact('transactionCount', 'accountCount'));
    }
}
