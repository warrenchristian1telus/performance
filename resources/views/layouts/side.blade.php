@extends('adminlte::page')

@section('title', $attributes['title'])

@section('content_header')
    {{ $header ?? '' }}
@stop

@section('content')
    {{ $slot }}
@stop

@section('css')
    <style>
        label{
            width: 100%;
        }
    </style>
    {{ $css ?? '' }}
@stop

@section('js')
    {{ $js ?? '' }}
@stop