@extends('frontend.layouts.main')

@section('title', "\$category->title")
@section('description', "\$category->description")

@section('content')
    @include('frontend.auction.auction.about')
    @include('frontend.auction.auction.description')
    @include('frontend.auction.auction.apartment')
    @include('frontend.auction.auction.auction')

    @include('frontend.common.form')
@stop