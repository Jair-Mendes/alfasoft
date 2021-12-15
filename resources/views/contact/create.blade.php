@extends('layouts.app')
@section('title', 'Create')
@section('content')
    <div class="col-md-6">
        <form method="POST" action="{{ route('contact.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Your name" required value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="name@example.com" required value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Contact</label>
                <input type="tel" class="form-control" name="phone" placeholder="Your number" required value="{{ old('phone') }}">
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-secondary me-md-2" href="{{ route('contact.index') }}">Cancel</a>
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
