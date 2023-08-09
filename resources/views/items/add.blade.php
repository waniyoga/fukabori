@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品登録</h1>
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
                <form method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">購入した品</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="正式名称ではなくてもよい。自分の言葉で表現" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="type">種別</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="0">よく分からない</option>
                                <option value="1">消費</option>
                                <option value="2">投資</option>
                            </select>
                            @error('type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="price">価格</label>
                            <input type="number" name="price" class="form-control" id="price" placeholder="価格を入力してください" required>
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="detail">動機</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明" required>
                            @error('detail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
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
