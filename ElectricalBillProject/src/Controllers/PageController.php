<?php

namespace Vikto\ElectricalBillProject\Controller;

class PageController
{
    public function renderRegisterPage(): void
    {
        require __DIR__ . '/../../views/index.php';
    }

    public function renderNotFoundPage(): void
    {
        require __DIR__ . '/../../views/error/error.php';
    }
}