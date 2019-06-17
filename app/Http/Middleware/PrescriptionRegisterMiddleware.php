<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use VMN\Article\Remedy;
use VMN\Auth\HerbalMedicineStore;

class PrescriptionRegisterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        if($this->isIExisted($request))
        {
            return response()->json([
                'message' => 'Bài thuốc này đã có trong danh sách của bạn'
            ]);
        }

        $remedy = $this->makeRemedy($request->get('id'));

        $hms = $this->makeStore(\Session::get('credential')['attributes']['name']);
        if ( ! $hms instanceof HerbalMedicineStore){
            return response()->json([
                'message' => 'Tài khoản của bạn không thể thực hiện chức năng này'
            ]);
        }
        app()->bind(get_class($remedy), function () use ($remedy) {
            return $remedy;
        });
        app()->bind(get_class($hms), function () use ($hms) {
            return $hms;
        });
        return $next($request);
    }

    private function makeRemedy($id)
    {
        return Remedy::find($id);
    }

    private function makeStore($credential)
    {
        return HerbalMedicineStore::where('accountName', $credential)->first();
    }

    private function isIExisted($request)
    {
        if ( $request->path() != 'registerPrescription'){
            return false;
        }
        $pre = \DB::table('store_prescriptions')
            ->where('storeCredential', \Session::get('credential')['attributes']['name'])
            ->where('remedyId', $request->get('id'))
            ->get();
        if ( ! $pre){
            return false;
        }
        return true;
    }
}
