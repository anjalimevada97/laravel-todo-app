@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>
                <div class="col-md-12 bg-light text-right"><a href="{{ route('user.create') }}" style="float:right; margin:5px;" class="btn btn-success">+ Add New</a></div>

                <div class="card-body">
                    @if (session('success'))
                        <div id="alert" class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        <script>
                            // Automatically hide the alert after 3 seconds
                            setTimeout(function() {
                                document.getElementById('alert').style.display = 'none';
                            }, 3000);
                        </script>
                    @endif

                    <div class="mt-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>DOB</th>
                                    <th>Created At</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($users->isEmpty())
                                    <tr>
                                        <td colspan="7" class="text-center">No records found!</td>
                                    </tr>
                                @else
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user->full_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ '+91 '.$user->phone }}</td>
                                            <td>{{ $user->dob?->format('d-m-Y') }}</td>
                                            <td>{{ $user->created_at?->format('d-m-Y') }}</td>
                                            <td>
                                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

