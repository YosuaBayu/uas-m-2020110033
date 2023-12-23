@extends('layouts.master')

@section('title', 'Edit Transaction')

@section('content')
<div class="container">
    <h2>Edit Transaksi</h2>

    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $transaction->kategori }}" required>
        </div>
        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal</label>
            <input type="number" class="form-control" id="nominal" name="nominal" value="{{ $transaction->nominal }}" required>
        </div>
        <div class="mb-3">
            <label for="tujuan" class="form-label">Tujuan</label>
            <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ $transaction->tujuan }}" required>
        </div>
        <div class="mb-3">
            <label for="account_id" class="form-label">Account ID</label>
            <input type="text" class="form-control" id="account_id" name="account_id" value="{{ $transaction->account_id }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
