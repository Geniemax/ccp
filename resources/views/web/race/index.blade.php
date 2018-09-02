@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">More</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($races as $race)
                    <tr>
                        <td>{{ ucwords($race->getName()) }}</td>
                        <td>
                            @if($race->getStatus() === false)
                                <a href="#" class="btn btn-danger">
                                    Ended
                                </a>
                            @else
                                <a href="{{ route('races.show', $race->getId()) }}" class="btn btn-success">
                                    View Event
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
