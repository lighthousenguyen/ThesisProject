<?php

namespace VMN\MemberFindingService;


class HSMFindingCondition implements MemberFindingCondition
{
    protected $storeName;
    protected $address;
    protected $phonenumber;
    protected $representative;

    /**
     * @return string
     */
    public function getStoreName()
    {
        return $this->storeName;
    }

    /**
     * @param string $storeName
     * @return $this
     */
    public function setStoreName($storeName)
    {
        $this->storeName = $storeName;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phonenumber;
    }

    /**
     * @param string $phonenumber
     * @return $this
     */
    public function setPhoneNumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getRepresentative()
    {
        return $this->representative;

    }

    /**
     * @param string $representative
     * @return $this
     */
    public function setRepresentative($representative)
    {
        $this->representative = $representative;
        return $this;
    }



    public function getQuery()
    {
        $query =  \DB::table('herbal_medicine_stores')
            ->join('credentials','accountName', '=', 'credentials.name')
            ->where('storename', 'like', '%'.$this->getStoreName().'%')
            ->where('address', 'like', '%'.$this->getAddress().'%')
            ->where('phonenumber', 'like', '%'.$this->getPhoneNumber().'%')
            ->where('representative', 'like', '%'.$this->getRepresentative().'%')
            ->where('credentials.status', '=', 'active')
        ;
        return $query->paginate(6)
            ->appends('storename', $this->getStoreName())
            ->appends('address', $this->getAddress())
            ->appends('phonenumber', $this->getPhoneNumber())
            ->appends('representative', $this->getRepresentative())
            ;

    }
}