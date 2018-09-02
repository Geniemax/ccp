@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(!$raceUsers->isEmpty())
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Start Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($raceUsers as $raceUser)
                            <tr>
                                <td>{{ ucwords($raceUser->name) }}</td>
                                <td>{{ $raceUser->start_time or 'Unavailable' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="alert alert-danger">This race event doesn't have any users at current.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
