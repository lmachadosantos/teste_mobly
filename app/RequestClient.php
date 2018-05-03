<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestClient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'request_id', 'name', 'cpf'
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
        $requestClient = new RequestClient();

        $requestClient->request_id = $request->id;
        $requestClient->name = $data->query('name');
        $requestClient->cpf = $this->onlyNumbers($data->query('cpf'));

        $requestClient->save();

        return true;
    }
}
