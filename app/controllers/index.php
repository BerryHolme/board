<?php

namespace controllers;

class index
{
    public function index(\Base $base)
    {
        echo \Template::instance()->render("index.html");
    }

    public function install(\Base $base)
    {
        \models\pins::setup();
        \models\pins::setdown();

        echo ('nainstalovano');

    }


    public function loadpins(\Base $base)
    {
        $pins = new \models\pins();
        $allPins = $pins->find();
        $result = [];
        foreach ($allPins as $pin) {
            $result[] = [
                'id' => $pin->id,
                'content' => $pin->content,
                'author' => $pin->author,
                'color' => $pin->color,
            ];
        }
        echo json_encode($result);
    }

}