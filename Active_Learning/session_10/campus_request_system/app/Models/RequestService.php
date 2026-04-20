<?php

class RequestService
{
    private RequestRepository $requestRepository;

    public function __construct(RequestRepository $requestRepository)
    {
        $this->requestRepository = $requestRepository;
    }

    public function getAllRequests(): array
    {
        return $this->requestRepository->findAll();
    }

    public function getRequestById(int $id): ?array
    {
        return $this->requestRepository->findById($id);
    }

    public function createRequest(array $data): int
    {
        $data['status'] = 'Pending';
        return $this->requestRepository->create($data);
    }

    public function changeStatus(int $id, string $status): bool
    {
        $allowedStatuses = ['Pending', 'In Progress', 'Done'];

        if (!in_array($status, $allowedStatuses, true)) {
            return false;
        }

        return $this->requestRepository->updateStatus($id, $status);
    }
}