<?php

namespace VMN\Auth;


use Illuminate\Database\Eloquent\Model;
use VMN\Contracts\Auth\Authenticable;
use VMN\Contracts\Auth\Credential;

class HerbalMedicineStore extends Model implements Authenticable
{

    protected $table = 'herbal_medicine_stores';

    /**
     * @return Credential
     */
    public function getCredential()
    {
        // TODO: Implement getCredential() methodecho
    }


}