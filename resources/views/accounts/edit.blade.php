@extends('layouts.master')

@section('title', 'Edit Account')

@section('content')
<div class="container">
    <h2>{{ isset($account) ? 'Edit Account' : 'Create New Account' }}</h2>

    @if(isset($account))
        <form action="{{ route('accounts.update', $account->id) }}" method="POST">
        @method('PUT')
    @else
        <form action="{{ route('accounts.store') }}" method="POST">
    @endif
        @csrf
        <div class="form-group">
            <label for="nama">Name:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', isset($account) ? $account->nama : '') }}">
        </div>
        <div class="form-group">
            <label for="jenis">Type:</label>
            <select class="form-control" id="jenis" name="jenis">
                <option value="Personal" {{ old('jenis', isset($account) && $account->jenis == 'Personal' ? 'selected' : '') }}>Personal</option>
                <option value="Bisnis" {{ old('jenis', isset($account) && $account->jenis == 'Bisnis' ? 'selected' : '') }}>Bisnis</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection