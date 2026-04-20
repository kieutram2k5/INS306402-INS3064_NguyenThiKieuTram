<h1>Request Detail</h1>

<?php if (empty($request)): ?>
    <p>Request not found.</p>
<?php else: ?>
    <p><strong>Title:</strong> <?= htmlspecialchars($request['title'] ?? '') ?></p>
    <p><strong>Description:</strong> <?= htmlspecialchars($request['description'] ?? '') ?></p>
    <p><strong>Location:</strong> <?= htmlspecialchars($request['location'] ?? '') ?></p>
    <p><strong>Category:</strong> <?= htmlspecialchars($request['category'] ?? '') ?></p>
    <p><strong>Status:</strong> <?= htmlspecialchars($request['status'] ?? '') ?></p>
<?php endif; ?>