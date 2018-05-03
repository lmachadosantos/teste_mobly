<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestProduct extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'request_id', 'product_id', 'amount', 'value'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function addProductRequest($product, $request)
    {

        $returnRequestProduct = $this->where(['request_id' => $request->id, 'product_id' => $product->id], '=')->first();

        if(!$returnRequestProduct){
            $newRequestProduct = new RequestProduct();

            $newRequestProduct->request_id = $request->id;
            $newRequestProduct->product_id = $product->id;
            $newRequestProduct->amount = 1;
            $newRequestProduct->value = $product->price;

            $newRequestProduct->save();

            $returnRequestProduct = $newRequestProduct;
        }else{
            $returnRequestProduct->amount = $returnRequestProduct->amount + 1;
            $returnRequestProduct->value = ($product->price * $returnRequestProduct->amount);

            $returnRequestProduct->save();
        }

        return $returnRequestProduct;
    }

    public function updateAmount($requestProductId, $amount)
    {
        $returnRequestProduct = $this->find($requestProductId[0]);

        if($amount[0] > 0){
            $returnRequestProduct->amount = $amount[0];
            $returnRequestProduct->value = ($returnRequestProduct->product->price * $amount[0]);
            $returnRequestProduct->save();
        }else{
            $returnRequestProduct->delete();
        }

        return true;
    }

    public function deleteItem($requestProductId)
    {
        $returnRequestProduct = $this->find($requestProductId);
        $requestId = $returnRequestProduct->request_id;

        $returnRequestProduct->delete();

        $existItems = $this->where(['request_id' => $requestId], '=')->count();

        if($existItems == 0){
            $request = new Request();
            $deleteRequest = $request->find($requestId);

            $deleteRequest->delete();
        }

        return true;
    }
}
