@extends('frontend.layouts.main')

@section('title', "\$category->title")
@section('description', "\$category->description")

@section('content')
    @include('frontend.common.bidding')
    @include('frontend.common.growth')
    @include('frontend.common.investment')
    @include('frontend.auction.auction.description')
    @include('frontend.auction.auction.apartment')
    @include('frontend.auction.auction.auction')

    @include('frontend.common.form')
@stop