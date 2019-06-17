<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use VMN\Article\ArticleFactory;
use VMN\MessagingService\Message;
use VMN\MessagingService\MessageManager;

class ModProceedMiddleWare
{
    public function handle(Request $request, \Closure $next)
    {
        $parameter = $this->makeCondition($request);
        app()->bind(get_class($parameter), function () use ($parameter) {
            return $parameter;
        });

        return $next($request);
    }

    public function makeCondition($request)
    {
        $plantFactory = new ArticleFactory();
        if ($request->path() == 'approveNewPlant')
        {
            $plantRaw = \DB::table('medicinal_plants_history')
                ->where('id', $request->get('id'))
                ->first();
            return $plantFactory->makeNewPlant(get_object_vars($plantRaw));
        }
        elseif ($request->path() == 'approveEditPlant')
        {
            $plantRaw = \DB::table('medicinal_plants_history')
                ->where('id', $request->get('id'))
                ->first();
            return $plantFactory->makePlantChange(get_object_vars($plantRaw));
        }
        elseif ($request->path() == 'approveNewRemedy')
        {
            $RemedyRaw = \DB::table('remedies_history')
                ->where('id', $request->get('id'))
                ->first();
            return $plantFactory->makeRemedy(get_object_vars($RemedyRaw));
        }
        elseif ($request->path() == 'approveEditRemedy')
        {
            $RemedyRaw = \DB::table('remedies_history')
                ->where('id', $request->get('id'))
                ->first();
            return $plantFactory->makeRemedyChange(get_object_vars($RemedyRaw));
        }
        elseif ($request->path() == 'remindPlantAuthor')
        {
            $messageComposer = new MessageManager();

            return with( new Message())
                ->setFrom(\Session::get('managementCredential')['attributes']['name'])
                ->setTo($request->get('to'))
                ->setContent($messageComposer->composeContent('plant',
                    $request->get('reported'),
                    $request->get('articleName'),
                    $request->get('reason')))
                ;
        }
        elseif ($request->path() == 'remindRemedyAuthor')
        {
            $messageComposer = new MessageManager();

            return with( new Message())
                ->setFrom(\Session::get('managementCredential')['attributes']['name'])
                ->setTo($request->get('to'))
                ->setContent($messageComposer->composeContent('remedy',
                    $request->get('reported'),
                    $request->get('articleName'),
                    $request->get('reason')))
                ;
        }
    }


}