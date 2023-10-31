@extends('frontend.layouts.main')

@section('title', "\$category->title")
@section('description', "\$category->description")

@section('content')
    @include('frontend.user.favorites.favorites')

    @include('frontend.common.form')
@stop
