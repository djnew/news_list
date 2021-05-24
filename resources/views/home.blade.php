@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($data as $section)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$section['name']}}</h5>
                            Элементов {{$section['news_element_count']}}<br />
                            <a href="/news/{{$section['code']}}" class="btn btn-primary">Перейти </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
