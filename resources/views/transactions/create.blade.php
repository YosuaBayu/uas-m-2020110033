@extends('layouts.master')

@section('title', 'Create New Transaction')

@section('content')
<div class="container">
    <h2>Tambah Transaksi Baru</h2>

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori" required>
        </div>
        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal</label>
            <input type="number" class="form-control" id="nominal" name="nominal" required>
        </div>
        <div class="mb-3">
            <label for="tujuan" class="form-label">Tujuan</label>
            <input type="text" class="form-control" id="tujuan" name="tujuan" required>
        </div>
        <div class="mb-3">
            <label for="account_id" class="form-label">Account ID</label>
            <select class="form-control" id="account_id" name="account_id" required>
                @foreach($accounts as $account)
                    <option value="{{ $account->id }}">{{ $account->id }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
