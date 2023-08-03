<?php declare(strict_types=1);


namespace MichaelKeiluweit\DicExample\Http\Controller\Frontpage;

use MichaelKeiluweit\DicExample\Http\TemplateAdvanced\TemplateAdvancedService;

class FrontpageWithAdvancedTemplateController
{
    public function __construct(private TemplateAdvancedService $templateAdvanced) {}

    public function index()
    {
        $this->templateAdvanced->do();
        echo static::class . PHP_EOL;
    }
}
