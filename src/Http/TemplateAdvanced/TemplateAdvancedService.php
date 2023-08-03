<?php declare(strict_types=1);


namespace MichaelKeiluweit\DicExample\Http\TemplateAdvanced;

use MichaelKeiluweit\DicExample\Http\Template\TemplateService;

class TemplateAdvancedService
{
    public function __construct(private TemplateService $templateService) {}

    public function do(): void
    {
        $this->templateService->do();
        echo static::class . PHP_EOL;
    }
}
