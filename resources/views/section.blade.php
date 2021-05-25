@extends('layouts.app')

@section('content')
    <div class="uk-section uk-section-muted">
        <div class="uk-container">
            <h3>{{$section->name}}</h3>
            <div uk-grid="">
                @foreach ($elementsResource->data as $element)
                    <div class="uk-width-1-3@l uk-width-1-2@m">
                        <div class="uk-card uk-card-default ">
                            <div class="uk-card-header">
                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                    <div class="uk-width-expand">
                                        <h3 class="uk-card-title uk-margin-remove-bottom">{{$element->name}}</h3>
                                        <p class="uk-text-meta uk-margin-remove-top">
                                            Просмотров {{$element->show_count}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-card-body">
                                <p>{{$element->text}}</p>
                            </div>
                            <div class="uk-card-footer">
                                <a href="/news/{{$section->code}}/{{$element->code}}/" class="uk-button uk-button-text">Подробнее</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="uk-width-1-1">
                    <ul class="uk-pagination uk-margin uk-flex-center">
                        @foreach ($elementsResource->meta->links as $pageLinks)
                            <li
                                class="@if ($pageLinks->active) uk-disabled @else uk-active @endif"
                            >

                                <a href="{{$pageLinks->url}}">
                                    <span>{{$pageLinks->label}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
