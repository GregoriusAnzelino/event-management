<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Event</title>
</head>
<body>
    <h1>Select Event to Create Ticket</h1>
    <ul>
    <?php foreach ($events as $event): ?>
        <li>
            <a href="/tickets/create/<?= $event['id'] ?>">
                Create Ticket for <?= isset($event['title']) ? $event['title'] : 'Event Tanpa Nama' ?>
            </a>
        </li>
    <?php endforeach; ?>
    </ul>
</body>
</html>