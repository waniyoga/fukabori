@extends('adminlte::page')

@section('title', '検索結果')

@section('content')
    <h1>キーワード検索結果</h1>

    @if(count($items) > 0 || count($deepdives) > 0 || count($users) > 0)
        @if(count($items) > 0)
            <h2>商品</h2>
            <ul>
                @foreach($items as $item)
                <li>{{ $item->name }} - 種別:
                    @if($item->type === 0)
                        よく分からない
                    @elseif($item->type === 1)
                        消費
                    @elseif($item->type === 2)
                        投資
                    @else
                        不明
                    @endif
                </li>
                @endforeach
            </ul>
        @endif

        @if(count($deepdives) > 0)
            <h2>深堀結果</h2>
            <ul>
                @foreach($deepdives as $deepdive)
                    <!-- 深堀結果の表示内容を追加する -->
                @endforeach
            </ul>
        @endif

        @if(count($users) > 0)
            <h2>ユーザー</h2>
            <ul>
                @foreach($users as $user)
                    <!-- ユーザー情報の表示内容を追加する -->
                @endforeach
            </ul>
        @endif
    @else
        <p>検索結果はありません。</p>
    @endif
@endsection
