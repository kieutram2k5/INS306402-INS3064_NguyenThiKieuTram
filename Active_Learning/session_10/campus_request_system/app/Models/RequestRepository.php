<?php

class RequestRepository
{
    public function findAll(): array
    {
        return [];
    }

    public function findById(int $id): ?array
    {
        return null;
    }

    public function create(array $data): int
    {
        return 1;
    }

    public function updateStatus(int $id, string $status): bool
    {
        return true;
    }
}