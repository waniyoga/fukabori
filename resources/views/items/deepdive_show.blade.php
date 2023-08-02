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
                            <h4 class="text-primary mb-3">動機: {{ $item->detail }}</h4>
                            @php
                                $itemAnswers = $deepDiveAnswers->where('item_id', $item->id);
                            @endphp

                            <div id="answers-{{ $item->id }}">
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
                                    <p class="text-muted">深堀結果はまだありません。</p>
                                @endif
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
