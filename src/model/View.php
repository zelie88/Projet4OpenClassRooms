<?php

namespace Projet4OpenClassRooms\src\model;

class View
{
    private $file;
    private $title;

    public function render($template, $data = [])
    {
        $this->file = '../templates/'.$template.'.php';
        $content = $this->renderFile($this->file, $data);
        $view = $this->renderFile('../templates/basic.php',
            [
                'title' => $this->title,
                'content' => $content,
            ]);
        echo $view;
    }

    private function renderFile($file, $data)
    {
        if(file_exists($file))
        {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        header('Location: index.php?action=notFound');
    }
}