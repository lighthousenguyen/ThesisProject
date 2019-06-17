<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use VMN\Article\Remedy;
use VMN\Auth\HerbalMedicineStore;
use VMN\PrescriptionService\PrescriptionService;
use App\Http\Middleware\PrescriptionRegisterMiddleware;

class PrescriptionRegisteringController extends Controller
{
    protected $prescriptionService;

    public function __construct(PrescriptionService $prescriptionService)
    {
        $this->prescriptionService = $prescriptionService;
        $this->middleware(PrescriptionRegisterMiddleware::class);
    }

    public function register(Remedy $remedy, HerbalMedicineStore $herbalMedicineStore)
    {
        $this-> prescriptionService->addPrescriptionByRegister($remedy, $herbalMedicineStore);
        return response()->json([
            'message' => 'Bài thuốc đã được đưa vào danh sách của nhà thuốc'
        ]);
    }

    public function remove(Remedy $remedy, HerbalMedicineStore $herbalMedicineStore)
    {
        $this-> prescriptionService->removeFromPrescriptionList($remedy, $herbalMedicineStore);
        return response()->json([
            'message' => 'Bài thuốc đã được đưa ra khỏi danh sách của nhà thuốc'
        ]);
    }
}