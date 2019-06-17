<?php

namespace VMN\MessagingService;



class MessageManager
{
    public function send(Message $message)
    {
        \DB::table('messages')->insert([
            'from'      => $message->getFrom(),
            'to'        => $message->getTo(),
            'content'   => $message->getContent()
        ]);
    }

    public function read(Message $message)
    {
        \DB::table('message')
            ->where('id', $message->getId())
            ->update(['unread'=> false]);
    }

    public function composeContent($type, $id, $name, $reason)
    {
        $content = '';
        if ($type == 'plant')
        {
            $url = route('plant-detail', ['id' => $id]);
            $content .= "Cây thuốc ".
                "<a href=\"".$url." \">"
            .$name."</a> bị báo cáo với lý do <i>". $reason ."</i>";
        }
        elseif($type =='remedy')
        {
            $url = route('remedy-detail', ['id' => $id]);
            $content .= 'Bài thuốc'.
                "<a href=\"".$url." \">"
            .$name."</a> bị báo cáo với lý do '<i>". $reason ."</i>'";
        }
        return $content;

    }
}
