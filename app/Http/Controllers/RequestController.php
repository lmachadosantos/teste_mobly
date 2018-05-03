<?php

namespace App\Http\Controllers;

use App\Product;
use App\RequestAddress;
use App\RequestClient;
use App\RequestProduct;
use Illuminate\Http\Request;

class RequestController extends Controller
{

    public function index(Request $request)
    {
        $userId = $request->session()->getId();
        $requestProducts = [];
        $newRequest = \App\Request::where(['user_id' => $userId, 'status' => 'RE'], '=')->first();

        if($newRequest)
            $requestProducts = RequestProduct::where(['request_id' => $newRequest->id], '=')->get();

        return view('requests.cart', compact('newRequest', 'requestProducts'));
    }

    public function finish()
    {
        return view('requests.finish');
    }

    public function add(Request $request)
    {
        $userId = $request->session()->getId();
        $product = Product::find( $request->query('product_id') );


        $order = new \App\Request();
        $newRequest = $order->generateOrder($userId);

        $requestProduct = new RequestProduct();
        $requestProduct->addProductRequest($product, $newRequest);

        return redirect('/request/');
    }

    public function updateItem(Request $request)
    {
        $amount = $request->query('amount');

        $requestProduct = new RequestProduct();
        $requestProduct->updateAmount(array_keys($amount), array_values($amount));

        return redirect('/request/');
    }

    public function deleteItem(Request $request)
    {
        $requestProductId = $request->query('requestProductId');

        $requestProduct = new RequestProduct();
        $requestProduct->deleteItem($requestProductId[0]);

        return redirect('/request/');
    }

    public function close(Request $request)
    {
        $userId = $request->session()->getId();

        $order = new \App\Request();
        $order = $order->closeOrder($userId);

        $requestClient = new RequestClient();
        $requestClient->register($request, $order);

        $requestAddress = new RequestAddress();
        $requestAddress->register($request, $order);

        $request->session()->regenerate();

        return redirect('/request/finish');
    }
}
