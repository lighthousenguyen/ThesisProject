<?php

namespace VMN\MemberFindingService;


class MemberInformationCondition implements MemberFindingCondition
{
    protected $credentialName;

    protected $role;

    /**
     * @return string $role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return $this
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return string $this->credentialName
     */
    public function getCredentialName()
    {
        return $this->credentialName;
    }

    /**
     * @param $credentialName
     * @return $this
     */
    public function setCredentialName($credentialName)
    {
        $this->credentialName = $credentialName;
        return $this;
    }


    public function getQuery()
    {
        if ($this->getRole() == 'store')
        {
            $table = 'herbal_medicine_stores';
            $selectField = ['accountName', 'herbal_medicine_stores.email',
                'storename', 'address', 'phonenumber', 'representative',
                'credentials.role', 'credentials.status'
            ];
        }
        else
        {
            $table = 'members';
            $selectField = ['accountName', $table.'.email',
                'firstName', 'lastName', 'DoB',
                'credentials.role', 'credentials.status'
            ];
        }
        return \DB::table($table)->leftJoin('credentials', $table.'.accountName', '=', 'credentials.name')
            ->where('accountName', $this->getCredentialName())
            ->first($selectField)
        ;

    }
}