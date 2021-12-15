@extends('layouts.app')
@section('title', $contact->name)
@section('content')
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{ $contact->name }}</td>
                    </tr>
                    <tr>
                        <th>Contact</th>
                        <td>{{ $contact->phone }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $contact->email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
