@extends('frontend.layouts.main')

@section('title', "\$category->title")
@section('description', "\$category->description")

@section('content')
    @include('frontend.properties.properties._properties')

    @include('frontend.common.partners')
    @include('frontend.common.form')
@stop
