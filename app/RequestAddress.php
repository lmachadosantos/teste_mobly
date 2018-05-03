<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestAddress extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'request_id', 'zip_code', 'address', 'number', 'neighborhood', 'state', 'city'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function request()
    {
        return $this->belongsTo(Request::class);
    }

    public function onlyNumbers($string)
    {
        return preg_replace("/[^0-9]/", "", $string);
    }

    public function register($data, $request)
    {
        $requestAddress = new RequestAddress();

        $requestAddress->request_id = $request->id;
        $requestAddress->zip_code = $this->onlyNumbers($data->query('zip_code'));
        $requestAddress->address = $data->query('address');
        $requestAddress->number = $this->onlyNumbers($data->query('number'));
        $requestAddress->neighborhood = $data->query('neighborhood');
        $requestAddress->state = $data->query('state');
        $requestAddress->city = $data->query('city');

        $requestAddress->save();

        return true;
    }
}
