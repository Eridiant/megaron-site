@extends('frontend.layouts.main')

@section('title', "\$category->title")
@section('description', "\$category->description")

@section('content')
    @include('frontend.site.index.first')
    @include('frontend.site.index._estate')
    @include('frontend.site.index._panorama')
    @include('frontend.site.index._recommend')
    @include('frontend.site.index._projects')
    @include('frontend.site.index._district')
    @include('frontend.site.index._offer')
    <!-- @include('frontend.site.index._map') -->

    @include('frontend.common.bidding')
    @include('frontend.common.growth')
    @include('frontend.common.investment')
    @include('frontend.common.experts')
    @include('frontend.common.form')
@stop
