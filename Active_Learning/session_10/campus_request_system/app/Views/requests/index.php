<h1>Request List</h1>

<?php if (empty($requests)): ?>
    <p>No requests found.</p>
<?php else: ?>
    <ul>
        <?php foreach ($requests as $request): ?>
            <li>
                <?= htmlspecialchars($request['title'] ?? 'No title') ?> -
                <?= htmlspecialchars($request['status'] ?? 'Unknown') ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>