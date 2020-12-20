<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Food;
use App\Orders;


class FoodController extends Controller
{

    public function index()
    {

        $articles = Food::select('*')
            ->get();

        return response()->json(['data' => $articles]);
    }
    public function orders()
    {

        $articles = Orders::select('*')
            ->get();

        foreach($articles as $article){
            $data[] = json_decode($article['json'], true);
            $cijena[] = $article['racun'];
        }

        return response()->json(['data' => $data, $cijena]);
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $bodyContent = $request->getContent();
        }
        $data = json_decode($bodyContent, true);
        $new_data = json_encode($data[0]);
        $orders = new Orders();
        $orders->json = $new_data;
        $orders->racun = $data[1];
        $orders->save();

        return response()->json(['messages' => 'Uspijesno']);
    }

    public function destroy(Request $request)
    {

        if ($request->isMethod('post')) {
            $bodyContent = $request->getContent();
        }
        $id = json_decode($bodyContent, true);
        $article = Food::select('*')
            ->where('id', '=', $id[0]['id'])
            ->first();
        $article->delete();
        return response()->json(['data' => 'Uspijesno']);

    }
}
