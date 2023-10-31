@extends('frontend.layouts.main')

@section('title', "\$category->title")
@section('description', "\$category->description")

@section('content')
    <h1>{{$slug}}</h1>
    @include('frontend.properties.show.gallery')
    @include('frontend.properties.show.apartment')
    @include('frontend.properties.show.layout')
    @include('frontend.properties.show.payment')

@stop