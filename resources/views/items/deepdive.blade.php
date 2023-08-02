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
                    <h3 class="card-title">深堀</h3>
                </div>
                <div class="card-body">
                    <h4>自分の価値観と: {{ $item->name }}との関係</h4>
                    <form action="{{ route('items.deepdive.submit', $item->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>1. なぜこの商品を選んだのか、そのポジティブな要素を教えてください。</label>
                            <textarea name="question_1" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>2. この商品を使うことで感じる喜びや満足を一言で表現してください。</label>
                            <input type="text" name="question_2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>3. 同じような商品や価値観に合わない理由を教えてください。</label>
                            <input type="text" name="question_3" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>4. この商品を選んだ背景や理由について教えてください。</label>
                            <input type="text" name="question_4" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>5. この商品にあなただけの特別な名前をつけてください。</label>
                            <textarea name="question_5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>6. この商品を購入・投資することで描く未来について教えてください。どのようなポジティブな変化があると想像していますか？</label>
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
