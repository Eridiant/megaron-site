@extends('frontend.layouts.main')

@section('title', "\$category->title")
@section('description', "\$category->description")

@section('content')
    @include('frontend.apartments.apartments.apartments')

    @include('frontend.common.experts')
    @include('frontend.common.partners')
    @include('frontend.common.form')
@stop
