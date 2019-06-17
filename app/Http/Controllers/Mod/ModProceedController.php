<?php

namespace App\Http\Controllers\Mod;


use App\Http\Controllers\Controller;
use VMN\Article\MedicinalPlant;
use VMN\Article\Remedy;
use VMN\Article\ModProcessor;
use App\Http\Middleware\ModProceedMiddleWare;
use VMN\MessagingService\Message;
use VMN\MessagingService\MessageManager;

class ModProceedController extends Controller
{

    protected $processor;

    public function __construct(ModProcessor $processor)
    {
        $this->processor = $processor;
        $this->middleware(ModProceedMiddleWare::class);
    }

    public function approveNewPlant(MedicinalPlant $plant)
    {
        $this->processor->approvePlant($plant, \Request::input('id'));
        return response()->json([
            'message' => 'Cây thuốc đã được đưa vào dữ liệu hệ thống'
        ]);
    }

    public function approveEditedPlant(MedicinalPlant $plant)
    {
        $this->processor->approvePlant($plant, \Request::input('id'));
        return response()->json([
            'message' => 'Chỉnh sửa đã được cập nhật'
        ]);
    }

    public function denyPlant()
    {
        $this->processor->denyPlant(\Request::input('id'));
        return response()->json([
            'message' => 'Yêu cầu đã bị từ chối'
        ]);
    }


    public function approveNewRemedy(Remedy $remedy)
    {
        $this->processor->approveNewRemedy($remedy, \Request::input('id'));
        return response()->json([
            'message' => 'Bài thuốc đã được đưa vào dữ liệu hệ thống'
        ]);
    }

    public function approveEditRemedy(Remedy $remedy)
    {
        $this->processor->approveEditedRemedy($remedy, \Request::input('id'));
        return response()->json([
            'message' => 'Chỉnh sửa đã được cập nhật'
        ]);
    }

    public function rejectRemedy()
    {
        $this->processor->rejectRemedy(\Request::input('id'));
        return response()->json([
            'message' => 'Yêu cầu đã bị từ chối'
        ]);
    }

    public function remindPlantAuthor(Message $message)
    {
        $this->processor->remindAuthor($message, \Request::input('reportId'), 'medicinal_plants_reports');
        return response()->json([
            'message' => 'Đã gửi nhắc nhở đến tác giả bài viết'
        ]);
    }

    public function remindRemedyAuthor(Message $message)
    {
        $this->processor->remindAuthor($message, \Request::input('reportId'), 'remedies_reports');
        return response()->json([
            'message' => 'Đã gửi nhắc nhở đến tác giả bài viết'
        ]);
    }
}