<?php

namespace src\Views; // Исправлено: src -> Src, views -> Views

class View
{
    private $layout;

    public function __construct(string $layout)
    {
        $this->layout = $layout;
    }
    
    public function renderHTML(
        string $viewName,
        array $vars = [],
        int $code = 200
    ): void {
        $layoutFile = "layouts/{$this->layout}.php";
        $content = $this->renderFile($viewName, $vars);
        $fileVars = ['content' => $content];
        echo $this->renderFile($layoutFile, $fileVars);
    }

    public function renderFile(
        string $fileName,
        array $vars
    ) {
        extract($vars);
        $fileName = __DIR__ . '/' . $fileName;
        if (file_exists($fileName)) {
            ob_start();
            include $fileName;
            $buffer = ob_get_contents();
            ob_end_clean(); // Исправлено: ob_get_clean() -> ob_end_clean()
            return $buffer;
        } else {
            echo "Не найден файл: $fileName"; // Исправлено: $filename -> $fileName
        }
    }
}