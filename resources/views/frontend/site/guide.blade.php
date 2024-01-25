@extends('frontend.layouts.main')

@section('title', "\$category->title")
@section('description', "\$category->description")

@section('content')
    @include('frontend.site.guide._guide')
    @include('frontend.site.index._offer')
    @include('frontend.common.form')
@stop