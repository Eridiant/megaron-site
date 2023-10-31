@extends('frontend.layouts.main')

@section('title', "\$category->title")
@section('description', "\$category->description")

@section('content')
    @include('frontend.news.news.event')

    @include('frontend.common.form')
@stop