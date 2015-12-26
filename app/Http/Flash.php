<?php

namespace app\Http;


class Flash
{

    public function create($title, $message, $level)
    {
        session()->flash('flash_message', [
            'title'     => $title,
            'message'   => $message,
            'level'     => $level
        ]);
    }

    public function __call($level, $args)
    {
        $args['level'] = $level;

        call_user_func_array([$this, 'create'], $args);
    }

//    public function message($title, $message)
//    {
//        session()->flash('flash_message', [
//            'title'     => $title,
//            'message'   => $message,
//            'level'     => 'info'
//        ]);
//    }
//
//    public function success($title, $message)
//    {
//        session()->flash('flash_message', [
//            'title'     => $title,
//            'message'   => $message,
//            'level'     => 'success'
//        ]);
//    }
}