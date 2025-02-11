@extends('layouts.ss-detail')

@section('title', '花屋')
@section('background-image', '/img/shopping-street/hidamari/background.jpg')
@section('shopping-street-name', 'hidamari')

@section('content')
    <h1>
        現在準備中です。
    </h1>

    <x-transition.back-to-map name="{{ $name }}" />
@endsection