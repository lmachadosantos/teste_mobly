<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function generateOrder($userId)
    {
        $returnRequest = $this->where('user_id', '=', $userId)->first();

        if(!$returnRequest){
            $newRequest = new Request();

            $newRequest->user_id = $userId;
            $newRequest->status = 'RE';

            $newRequest->save();

            $returnRequest = $newRequest;
        }


        return $returnRequest;
    }

    public function closeOrder($userId)
    {
        $returnRequest = $this->where('user_id', '=', $userId)->first();

        $returnRequest->status = 'AP';
        $returnRequest->save();

        return $returnRequest;
    }
}
