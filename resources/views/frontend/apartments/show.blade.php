@extends('frontend.layouts.main')

@section('title', "\$category->title")
@section('description', "\$category->description")

@section('content')
    <section class="container" style="max-width: 1204px; margin-left: auto; margin-right: auto">
        <div class="image">
            @foreach ($apartment->media as $img)
                <picture>
                    <img src="/uploads/{{$img}}" alt="">
                </picture>
            @endforeach
        </div>
        <p class="title">{{ $apartment->content->name }}</p>
        <p>{{ $apartment->content->description }}</p>
    </section>

    @include('frontend.common.experts')
    @include('frontend.common.partners')
    @include('frontend.common.form')
@stop

