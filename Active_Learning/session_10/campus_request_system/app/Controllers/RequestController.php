<?php

require_once __DIR__ . '/../Models/Request.php';
require_once __DIR__ . '/../Models/RequestRepository.php';
require_once __DIR__ . '/../Models/RequestService.php';
require_once __DIR__ . '/../Models/RequestValidator.php';
require_once __DIR__ . '/../Views/ViewRenderer.php';

class RequestController
{
    private RequestService $requestService;
    private RequestValidator $validator;
    private ViewRenderer $viewRenderer;

    public function __construct()
    {
        $repository = new RequestRepository();
        $this->requestService = new RequestService($repository);
        $this->validator = new RequestValidator();
        $this->viewRenderer = new ViewRenderer();
    }

    public function index(): void
    {
        $requests = $this->requestService->getAllRequests();
        $this->viewRenderer->render('requests/index', ['requests' => $requests]);
    }

    public function show(int $id): void
    {
        $request = $this->requestService->getRequestById($id);
        $this->viewRenderer->render('requests/show', ['request' => $request]);
    }

    public function create(): void
    {
        $this->viewRenderer->render('requests/create');
    }

    public function store(): void
    {
        $data = [
            'title' => $_POST['title'] ?? '',
            'description' => $_POST['description'] ?? '',
            'location' => $_POST['location'] ?? '',
            'category' => $_POST['category'] ?? ''
        ];

        $errors = $this->validator->validateCreate($data);

        if (!empty($errors)) {
            echo "Validation failed";
            return;
        }

        $this->requestService->createRequest($data);
        echo "Request created successfully";
    }

    public function updateStatus(int $id): void
    {
        $newStatus = $_POST['status'] ?? '';

        if (!$this->validator->validateStatus($newStatus)) {
            echo "Invalid status";
            return;
        }

        $this->requestService->changeStatus($id, $newStatus);
        echo "Status updated successfully";
    }

    public function staffIndex(): void
    {
        $requests = $this->requestService->getAllRequests();
        $this->viewRenderer->render('requests/index', ['requests' => $requests]);
    }
}