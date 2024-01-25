@extends('frontend.layouts.main')

@section('title', "$news->seo->meta_title")
@section('description', "$news->seo->meta_description")
@section('keywords', "$news->seo->keywords")

@section('content')
    @include('frontend.news.news.show')
@stop

