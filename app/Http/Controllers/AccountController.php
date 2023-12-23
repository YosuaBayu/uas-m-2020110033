<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::all();

        return view('accounts.index', compact('accounts'));
    }

    public function create()
    {
        return view('accounts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => [
                'required',
                'string',
                'max:16',
                Rule::unique('accounts')->ignore($request->id),
            ],
            'nama' => 'required',
            'jenis' => 'required|in:Personal,Bisnis',
        ]);

        try {
            Account::create($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['id' => 'The ID has already been taken.'])->withInput();
        }

        return redirect()->route('accounts.index')->with('success', 'Account created successfully.');
    }

    public function edit(Account $account)
    {
        return view('accounts.edit', compact('account'));
    }

    public function update(Request $request, Account $account)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required|in:Personal,Bisnis',
        ]);

        $account->update($request->all());

        return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');
    }

    public function destroy(Account $account)
    {
        $account->delete();

        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully.');
    }
}
