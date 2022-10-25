<?php

namespace App;

use App\Exception\ViewNotFoundException;

// class View
// {
//     public function __construct(
//         // relative path ot the views file
//         protected string $view,
//         protected array $params = []
//     ) {
//     }

//     public function render(): bool|string
//     {
//         $filePath = VIEW_PATH . '/' . $this->view . '.php';

//         // var_dump($filePath);

//         // if $view is not a path it will trigger this
//         if (!$filePath) {
//             throw new ViewNotFoundException;
//         }

//         // check ob_
//         ob_start();
//         include $filePath;
//         return ob_get_clean();
//     }
// }

// redo 11/9
class View
{
    public function __construct(
        protected string $view,
        protected array $params = []
    ) {
    }

    public function render(): bool|string
    {
        // we can't simply include view since it is a relative path also it will look for the view within the same directory as the class while views is in a different folder altogether
        // include $this->view;

        // include VIEW_PATH . '/' . $this->view . '.php';

        // we can instead use the output buffer to return a string from the view file
        $filePath = VIEW_PATH . '/' . $this->view . '.php';

        // var_dump($filePath);

        // if $view is not a path it will trigger this
        if (!$filePath) {
            throw new ViewNotFoundException;
        }

        foreach ($this->params as $key => $value) {
            $$key = $value;
        }

        ob_start();

        include $filePath;

        return ob_get_clean();
    }

    public static function make(string $view, array $param = []): static
    {
        return new static($view, $param);
    }

    public function __toString(): string
    {
        return $this->render();
    }
}