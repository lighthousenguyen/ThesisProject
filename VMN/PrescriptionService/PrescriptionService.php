<?php

namespace VMN\PrescriptionService;


use VMN\Article\Remedy;
use VMN\Auth\HerbalMedicineStore;
use VMN\Contracts\Auth\Credential;


class PrescriptionService
{

    public function addPrescriptionByContribute(Remedy $remedy)
    {
        $hsm = HerbalMedicineStore::where('accountName', $remedy->getAuthor())->first();
        if ($this->isStore($remedy->getAuthor()))
        {
            \DB::table('store_prescriptions')->insert([
                'storeCredential' => $remedy->getAuthor(),
                'storeName'       => $hsm->storename,
                'storeAvatar'     => $hsm->avatar,
                'remedyId'        => $remedy->id(),
                'remedyTitle'     => $remedy->getTitle(),
                'remedyThumbnail' => $remedy->getThumbnailUrl()
            ]);
        }
    }

    private function isStore($credentialName)
    {
        $credential = Credential::where('name', $credentialName)->first();
        if ($credential->role == 'store')
            return true;
        else
            return false;
    }

    public function addPrescriptionByRegister(Remedy $remedy, HerbalMedicineStore $herbalMedicineStore)
    {
        \DB::table('store_prescriptions')->insert([
            'storeCredential' => \Session::get('credential')['attributes']['name'],
            'storeName'       => $herbalMedicineStore->storename,
            'storeAvatar'     => $herbalMedicineStore->avatar,
            'remedyId'        => $remedy->id(),
            'remedyTitle'     => $remedy->getTitle(),
            'remedyThumbnail' => $remedy->getThumbnailUrl()
        ]);
    }

    public function removeFromPrescriptionList(Remedy $remedy, HerbalMedicineStore $herbalMedicineStore)
    {
        \DB::table('store_prescriptions')
            ->where('storeCredential', $herbalMedicineStore->accountName)
            ->where('remedyId', $remedy->id())
            ->update(['deleted_at' => date('Y-m-d H:i:s')]);
    }

}