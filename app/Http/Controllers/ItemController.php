<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Deepdive;
use App\Models\User;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item::where('status', 'active')->get();

        return view('items.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'price' => $request->price,
                'detail' => $request->detail,
                'status' => 'active', // 仮でstatusを指定しています
            ]);

            return redirect('/');
        }

        return view('items.add');
    }
    
    /**
     * 商品削除
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', '商品が削除されました');
    }

/**
 * 深堀結果送信処理
 */
public function submitDeepDive(Request $request, Item $item)
{
    // 質問フォームの回答を取得
    $question1 = $request->input('question_1');
    $question2 = $request->input('question_2');
    $question3 = $request->input('question_3');
    $question4 = $request->input('question_4');
    $question5 = $request->input('question_5');
    $question6 = $request->input('question_6');

    // 深堀結果の保存などの処理を実行
    $deepDiveAnswer = Deepdive::create([
        'item_id' => $item->id,
        'question_1' => $question1,
        'question_2' => $question2,
        'question_3' => $question3,
        'question_4' => $question4,
        'question_5' => $question5,
        'question_6' => $question6,
    ]);

    // 成功メッセージをフラッシュするなどの処理を実行
    // ...

    return redirect()->route('items.deepdive.show', $item->id)->with('success', '回答が送信されました。');
}

public function deepDive(Request $request, Item $item)
{
    // 深堀結果表示のための処理を実装する
    // ...

    return view('items.deepdive', compact('item'));
}

/**
 * 深堀結果表示
 */
public function showDeepDive()
{
    $items = Item::where('status', 'active')->get();
    $deepDiveAnswers = Deepdive::whereIn('item_id', $items->pluck('id'))->get();

    return view('items.deepdive_show', compact('items', 'deepDiveAnswers'));
}

public function edit(Item $item)
{
    return view('items.edit', compact('item'));
}

public function update(Request $request, Item $item)
{
    // バリデーションなどの処理

    $item->name = $request->input('name');
    $item->type = $request->input('type');
    $item->price = $request->input('price');
    $item->detail = $request->input('detail');
    $item->save();

    // 更新後の処理やリダイレクトなどを追加

    return redirect()->route('items.index');
}

    // 検索機能
    public function searchForm()
    {
        return view('items.search_form');
    }

    public function search(Request $request)
{
    $keyword = $request->input('keyword');

    // Itemモデルから商品を検索
    $items = Item::query();
    if ($keyword) {
        $items->where('name', 'like', '%' . $keyword . '%')
              ->orWhere('type', 'like', '%' . $keyword . '%')
              ->orWhere('price', 'like', '%' . $keyword . '%')
              ->orWhere('detail', 'like', '%' . $keyword . '%');
    }
    $items = $items->get();

    // Deepdiveモデルから深堀結果を検索
    $deepdives = Deepdive::query();
    if ($keyword) {
        $deepdives->where('question_1', 'like', '%' . $keyword . '%')
                 ->orWhere('question_2', 'like', '%' . $keyword . '%')
                 ->orWhere('question_3', 'like', '%' . $keyword . '%')
                 ->orWhere('question_4', 'like', '%' . $keyword . '%')
                 ->orWhere('question_5', 'like', '%' . $keyword . '%')
                 ->orWhere('question_6', 'like', '%' . $keyword . '%');
    }
    $deepdives = $deepdives->get();

    // Userモデルからユーザー情報を検索
    $users = User::query();
    if ($keyword) {
        $users->where('name', 'like', '%' . $keyword . '%')
              ->orWhere('email', 'like', '%' . $keyword . '%');
    }
    $users = $users->get();

    // 検索結果をビューに渡す
    return view('items.search_result', compact('items', 'deepdives', 'users'));
}

}