<?php

class ViewRenderer
{
    public function render(string $view, array $data = []): void
    {
        extract($data);
        require __DIR__ . '/' . $view . '.php';
    }
}