@extends('adminlte::page')

@section('title', '深堀結果')

@section('content_header')
    <h1 class="text-center">深堀結果</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">回答内容</h3>
                </div>
                <div class="card-body">
                    @if ($items->count() > 0)
                        @foreach ($items as $item)
                            <div class="card mb-3"> {{-- アイテムごとにカードを追加 --}}
                                <div class="card-header">
                                    <h4 class="text-dark mb-3">アイテム名: {{ $item->name }}</h4>
                                    <p>種別: 
                                        @if ($item->type === 0)
                                            よく分からない
                                        @elseif ($item->type === 1)
                                            消費
                                        @elseif ($item->type === 2)
                                            投資
                                        @endif
                                    </p>
                                    <p>価格: {{ $item->price }} 円</p>
                                    <h3 class="text-primary mb-3">動機: {{ $item->detail }}</h3>
                                </div>
                                @php
                                    $itemAnswers = $deepDiveAnswers->where('item_id', $item->id);
                                @endphp

                                <div class="card-body">
                                    @if ($itemAnswers->count() > 0)
                                        @foreach ($itemAnswers as $answer)
                                            <div class="deep-dive-answer">
                                                <button class="btn btn-primary show-questions-btn">深堀回答</button>
                                                <div class="questions" style="display: none;">
                                                    <p>{{ $answer->question_1 }}</p>
                                                    <p>{{ $answer->question_2 }}</p>
                                                    <p>{{ $answer->question_3 }}</p>
                                                    <p>{{ $answer->question_4 }}</p>
                                                    <p>{{ $answer->question_5 }}</p>
                                                    <p>{{ $answer->question_6 }}</p>
                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach
                                    @else
                                        <a href="{{ route('items.deepdive', $item->id) }}" class="btn btn-secondary show-questions-btn">深堀</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted">商品が見つかりませんでした。</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .deep-dive-answer {
            margin-bottom: 20px;
        }
    </style>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $(".show-questions-btn").click(function() {
                $(this).next(".questions").slideToggle();
            });
        });
    </script>
@stop
