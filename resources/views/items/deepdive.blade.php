@extends('adminlte::page')

@section('title', '深堀')

@section('content_header')
    <h1>深堀</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <h4>自分の価値観と: {{ $item->name }}との関係</h4>
                    <form action="{{ route('items.deepdive.submit', $item->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>1. その商品のポジティブな要素を教えてください。</label>
                            <textarea name="question_1" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>2. その商品のネガティブな要素を教えてください</label>
                            <input type="text" name="question_2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>3. この商品を選んだ背景や理由について教えてください</label>
                            <input type="text" name="question_3" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>4. この商品とあなたの関係性を言葉にしてみてください</label>
                            <input type="text" name="question_4" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>5. この商品にあなただけの特別な名前をつけてください。</label>
                            <textarea name="question_5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>6. この商品の開発者になったつもりで情熱的にオススメしてみてください</label>
                            <textarea name="question_6" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">回答を送信</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
