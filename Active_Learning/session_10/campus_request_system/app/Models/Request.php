<?php

class Request
{
    private int $id;
    private string $title;
    private string $description;
    private string $location;
    private string $category;
    private string $status;
    private string $createdAt;

    public function __construct(
        int $id,
        string $title,
        string $description,
        string $location,
        string $category,
        string $status,
        string $createdAt
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->location = $location;
        $this->category = $category;
        $this->status = $status;
        $this->createdAt = $createdAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
}