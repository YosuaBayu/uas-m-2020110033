@extends('layouts.master')

@section('title', 'Account List')

@section('content')
<div class="container">
    <h2>Accounts</h2>
    <a href="{{ route('accounts.create') }}" class="btn btn-success mb-2">Create New Account</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
                <tr>
                    <td>{{ $account->id }}</td>
                    <td>{{ $account->nama }}</td>
                    <td>{{ $account->jenis }}</td>
                    <td>
                        <a href="{{ route('accounts.edit', $account->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('accounts.destroy', $account->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
