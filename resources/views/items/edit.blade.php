@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
    <h1>商品編集</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form method="POST" action="{{ route('items.update', $item->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">購入した品</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
                        </div>

                        <div class="form-group">
                            <label for="type">種別</label>
                            <select class="form-control" id="type" name="type">
                                <option value="0" {{ $item->type === 0 ? 'selected' : '' }}>よく分からない</option>
                                <option value="1" {{ $item->type === 1 ? 'selected' : '' }}>消費</option>
                                <option value="2" {{ $item->type === 2 ? 'selected' : '' }}>投資</option>
                            </select>
                        </div>
                        

                        <div class="form-group">
                            <label for="price">価格</label>
                            <input type="number" name="price" class="form-control" id="price" value="{{ $item->price }}">
                        </div>

                        <div class="form-group">
                            <label for="detail">動機</label>
                            <input type="text" class="form-control" id="detail" name="detail" value="{{ $item->detail }}">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
