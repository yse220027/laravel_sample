<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // TODO: データをすべて取得
        // SELECT * FROM items;
        $items = Item::get();
        $data['items'] = $items;

        // views/item/index.blade.php
        return view('item.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // views/item/create.blade.php
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // dd($request->all());
        //Requestからデータを取得
        $data = $request->all();
        //データベースに保存
        // INSERT INTO items (name, price) VALUES (xxxx, xxxx);
        Item::create($data);
        //リダイレクト
        return redirect(route('item.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        // $items[1] = "コーヒー";
        // $items[2] = "紅茶";
        // $items[3] = "ほうじ茶";
        $items = [
            1 => 'コーヒー',
            2 => '紅茶',
            3 => 'ほうじ茶',
        ];
        $item = "";
        if ($id > 0 && in_array($id, array_keys($items))) {
            $item = $items[$id];
        }
        // ビューに受け渡すデータ生成
        $data = ['item' => $item];

        // reources/views/item/show.blade.php を表示
        // データを受け渡す
        return view('item.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //商品IDから商品データを取得
        // SELECT * FROM items WHERE id = xx;
        $item = Item::find($id);
        dd($item);
        //編集画面を表示
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
