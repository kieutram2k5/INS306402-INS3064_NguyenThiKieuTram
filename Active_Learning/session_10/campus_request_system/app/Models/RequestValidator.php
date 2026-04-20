<?php

class RequestValidator
{
    public function validateCreate(array $data): array
    {
        $errors = [];

        if (empty(trim($data['title'] ?? ''))) {
            $errors[] = 'Title is required';
        }

        if (empty(trim($data['description'] ?? ''))) {
            $errors[] = 'Description is required';
        }

        if (empty(trim($data['location'] ?? ''))) {
            $errors[] = 'Location is required';
        }

        if (empty(trim($data['category'] ?? ''))) {
            $errors[] = 'Category is required';
        }

        return $errors;
    }

    public function validateStatus(string $status): bool
    {
        $allowedStatuses = ['Pending', 'In Progress', 'Done'];
        return in_array($status, $allowedStatuses, true);
    }
}