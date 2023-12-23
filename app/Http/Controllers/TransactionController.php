<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Account;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Tampilkan semua data transaksi
        $transactions = Transaction::all();
        $transactions2 = Transaction::select('transactions.id as transaction_id', 'transactions.*', 'accounts.nama as account_name')
        ->join('accounts', 'transactions.account_id', '=', 'accounts.id')
        ->get();

    return view('transactions.index', compact('transactions','transactions2'));
        
    }

    public function create()
    {
        // Tampilkan formulir pembuatan transaksi
        $accounts = Account::all();
        return view('transactions.create',compact('accounts'));
    }

    public function store(Request $request)
    {
        // Validasi input dan simpan data transaksi baru
        $request->validate([
            'kategori' => 'required',
            'nominal' => 'required|numeric',
            'tujuan' => 'required',
            'account_id' => 'required',
        ]);

        Transaction::create($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function edit(Transaction $transaction)
    {
        // Tampilkan formulir pengeditan transaksi
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        // Validasi input dan perbarui data transaksi
        $request->validate([
            'kategori' => 'required',
            'nominal' => 'required|numeric',
            'tujuan' => 'required',
            'account_id' => 'required',
        ]);

        $transaction->update($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy(Transaction $transaction)
    {
        // Hapus data transaksi
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}
