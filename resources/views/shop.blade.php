@extends('shopify-app::layouts.default')
@section('content')
    <p>User Id {{$shop_info['id']}}</p>
    <p>
        Shop Name - {{$shop_info['name']}}
    </p>
@endsection