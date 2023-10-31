@extends('frontend.layouts.main')

@section('title', "\$category->title")
@section('description', "\$category->description")

@section('content')
    @include('frontend.common.contacts')
    @include('frontend.common.form')
@stop