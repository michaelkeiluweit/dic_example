<?php declare(strict_types=1);


namespace MichaelKeiluweit\DicExample\Http\Controller\Frontpage;

use MichaelKeiluweit\DicExample\Http\Template\TemplateService;

class FrontpageWithTemplateController
{
    public function __construct(private TemplateService $template) {}

    public function index()
    {
        $this->template->do();
        echo static::class . PHP_EOL;
    }
}
