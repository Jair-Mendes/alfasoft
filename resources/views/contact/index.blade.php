@extends('layouts.app')
@section('title', 'Contact')
@section('content')
    <div class="col-md-12">
        @auth
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary" href="{{ route('contact.create') }}">New</a>
            </div>
        @endauth
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contacts as $contact)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>
                                <div class="d-grid gap-2 d-md-flex justify-content-center">
                                    <a class="btn btn-secondary me-md-2" href="{{ route('contact.show', $contact->id) }}">Detail</a>
                                    @if (Auth::user() && Auth::user()->id == $contact->user_id)

                                        <a class="btn btn-warning" href="{{ route('contact.edit', $contact->id)}}">Edit</a>

                                        <form method="POST" action="{{ route('contact.destroy', $contact->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    @endif
                                    {{-- @endauth --}}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <div class="card bg-danger border-0 shadow-lg m-3">
                            <div class="card-body text-center text-white">
                                <span>Any contact yet!</span>
                            </div>
                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- {{ $contacts->links() }} --}}
    </div>
@endsection
