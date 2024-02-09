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
        echo('sorry nefunguje');

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

    public function postAddPin(\Base $base)
    {
        $content = $base->get("POST.content");
        $author = $base->get("POST.author");
        $color = $base->get("POST.color");

        // Remove the first character from the color (assuming it's a '#')
        $color = substr($color, 1);

        $pin = new \models\pins();
        $pin->content = $content;
        $pin->author = $author;
        $pin->color = $color;
        $pin->save();
        // Save the pin
        echo json_encode(['success' => true]);

    }

    public function delete(\Base $base)
    {
        $id = $base->get("POST.id");
        $pinmodel = new \models\pins();
        $pin = $pinmodel->findone(['id=?', $id]);
        $pin->erase();
        echo json_encode(['succes' => true]);

    }


}