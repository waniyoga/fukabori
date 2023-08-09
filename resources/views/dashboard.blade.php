@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>使い方説明</h1>
@stop

@section('content')
    <p>
        このサイトは、不要な物、必要な物、そして、本当に欲しい物に繋げるための、自問自答に役立てればと思いつくりました。<br>
        なんとなく買ってしまう物や使っていない物、欲しい物を登録して、自分自身と向き合ってみましょう。<br>
        あなたのお悩み、私も同じ経験をしてきました。かつて、不要な物に振り回され、何が本当に必要なのか分からなくなることがありました。しかし、その経験は話のネタになります。<br>
        なんとなく買ってしまう物や、使ってない物、欲しい物を登録して、深堀（複数可）をして、マーケティングの勉強にも繋がるかもです。<br>
    </p>
    <h2>価値観をオープンに。そして言語化してみましょう。</h2>
@stop

@section('css')
    <style>
        h1 {
            color: #007bff;
            margin-bottom: 20px;
            text-align: center;
        }

        h2 {
            text-align: center;
        }
    </style>
@stop
