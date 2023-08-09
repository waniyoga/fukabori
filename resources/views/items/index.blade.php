@extends('adminlte::page')

@section('title', '商品価値一覧')

@section('content_header')
    <h1>商品一覧</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                
                <a href="{{ url('items/add') }}" class="btn btn-dark">商品登録</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>購入した品</th>
                            <th>種別</th>
                            <th>価格</th>
                            <th>動機</th>
                            <th class="text-right">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <!-- 種別表示ロジック -->
                                </td>
                                <td>{{ $item->price }}円</td>
                                <td>{{ $item->detail }}</td>
                                <td class="text-right">
                                    @if (Auth::check() && Auth::user()->id === $item->user_id)
                                        <form action="{{ url('items/' . $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">削除</button>
                                        </form>
                                        <a href="{{ route('items.deepdive', $item->id) }}" class="btn btn-primary">深堀</a>
                                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning">編集</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        /* スマートフォン画面用のカスタムスタイル */
        @media (max-width: 576px) {
            .card-title {
                font-size: 24px;
            }
            .card-body table td {
                font-size: 14px;
                white-space: nowrap;
            }
            .btn {
                font-size: 14px;
                padding: 5px 10px;
            }
        }
    </style>
@stop
