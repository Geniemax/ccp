@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://via.placeholder.com/350x150" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->getName() }}</h5>
                        <p class="card-text">{{ $user->race->getDescription() }}.</p>
                    </div>

                    <ul class="list-group list-group-flush">
                        @foreach($categories as $category)
                            <li class="list-group-item">
                                <a href="{{ route('races.category', $category->getId()) }}">{{ $category->getName() }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
