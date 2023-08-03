<?php declare(strict_types=1);


namespace MichaelKeiluweit\DicExample\Router\Entity;

use Exception;

final class Route
{
    private string $alias;

    private string $fullQualifiedNamespacePath;

    private string $action;

    public function getAlias(): string
    {
        return $this->alias;
    }

    public function setAlias(string $alias): void
    {
        $this->alias = $alias;
    }

    public function getFullQualifiedNamespacePath(): string
    {
        return $this->fullQualifiedNamespacePath;
    }

    public function setFullQualifiedNamespacePath(string $fullQualifiedNamespacePath): void
    {
        if (!class_exists($fullQualifiedNamespacePath)) {
            throw new Exception(
                sprintf('Route Config: Class "%s" is not existing.', $fullQualifiedNamespacePath)
            );
        }

        $this->fullQualifiedNamespacePath = $fullQualifiedNamespacePath;
    }

    public function setAction(string $action): void
    {
        $this->action = $action;
    }

    public function getAction(): string
    {
        return $this->action;
    }
}
