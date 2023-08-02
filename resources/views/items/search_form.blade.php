@extends('adminlte::page')

@section('title', 'キーワード検索')

@section('content_header')
    <h1>キーワード検索</h1>
@endsection

@section('content')
    <form action="{{ route('items.search_result') }}" method="get">
        @csrf
        <div class="d-flex justify-content-start">
            <input type="text" class="form" name="keyword" placeholder="キーワード" maxlength="100">
            <button class="btn btn-primary" type="submit">検索</button>
        </div>
    </form>
@endsection
