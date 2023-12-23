@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h1 class="mt-4">Dashboard</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Accounts</h5>
                        <p class="card-text">{{ $accountCount }}</p>
                        <a href="{{ route('accounts.index') }}" class="btn btn-success">Go to Accounts</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Transactions</h5>
                        <p class="card-text">{{ $transactionCount }}</p>
                        <a href="{{ route('transactions.index') }}" class="btn btn-primary">Go to Transactions</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
