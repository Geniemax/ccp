@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://via.placeholder.com/350x150" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $race->getName() }}</h5>
                        <p class="card-text">{{ $race->getDescription() }}.</p>
                    </div>

                    @foreach($race->getCategories() a)

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
