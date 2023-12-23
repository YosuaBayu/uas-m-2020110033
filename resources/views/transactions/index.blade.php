@extends('layouts.master')

@section('title', 'Transaction List')

@section('content')\
<div class="container">
    <h2>Daftar Transaksi</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('transactions.create') }}" class="btn btn-primary">Tambah Transaksi</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kategori</th>
                <th>Nominal</th>
                <th>Tujuan</th>
                <th>Nama Klien</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions2 as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->kategori }}</td>
                    <td>{{ $transaction->nominal }}</td>
                    <td>{{ $transaction->tujuan }}</td>
                    <td>{{ $transaction->account_name }}</td>
                    <td>
                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
