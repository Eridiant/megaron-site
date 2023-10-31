@extends('frontend.layouts.main')

@section('title', "\$category->title")
@section('description', "\$category->description")

@section('content')
    @include('frontend.site.about._team')
    @include('frontend.site.about._company')
    @include('frontend.common.experts')
    @include('frontend.common.partners')
    @include('frontend.common.contacts')
    @include('frontend.common.form')
@stop