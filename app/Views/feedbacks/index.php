<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        /* Reset dasar dan pengaturan umum */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2c3e50;
            color: #ecf0f1;
        }

        /* Gaya navbar */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #34495e;
            padding: 10px 20px;
            color: #ecf0f1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .logo {
            font-size: 1.8em;
            font-weight: bold;
            color: #1abc9c;
        }

        .menu {
            display: flex;
            gap: 20px;
        }

        .menu a {
            color: #ecf0f1;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            transition: background-color 0.3s, transform 0.3s;
        }

        .menu a:hover {
            background-color: #1abc9c;
            color: #34495e;
            transform: translateY(-2px);
        }

        .menu .logout {
            margin-left: auto;
            background-color: #e74c3c;
        }

        .menu .logout:hover {
            background-color: #c0392b;
        }

        /* Gaya tabel */
        .container {
            padding: 20px;
            text-align: center;
        }

        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
            border: 1px solid #34495e;
            background-color: #34495e;
        }

        .styled-table thead {
            background-color: #1abc9c;
            color: #2c3e50;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
            text-align: center;
        }

        .styled-table tr:nth-child(even) {
            background-color: #2c3e50;
        }

        .styled-table tr:hover {
            background-color: #1e2a33;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .edit-button,
        .delete-button {
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
            color: #ecf0f1;
            transition: background-color 0.3s, transform 0.3s;
            display: inline-block;
            text-align: center;
        }

        .edit-button {
            background-color: #3498db;
        }

        .edit-button:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        .delete-button {
            background-color: #e74c3c;
        }

        .delete-button:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
        }

        .no-data {
            font-style: italic;
            color: #bdc3c7;
        }

        /* Tombol untuk aksi tambahan */
        .add-feedback,
        .back-button {
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: #ecf0f1;
            background-color: #1abc9c;
            display: inline-block;
            margin: 10px 0;
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
        }

        .add-feedback:hover,
        .back-button:hover {
            background-color: #16a085;
            transform: translateY(-2px);
        }

        .add-feedback i,
        .back-button i {
            vertical-align: middle;
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">Dashboard</div>
        <div class="menu">
            <a href="/events"><i class="material-icons">event</i> Events</a>
            <a href="/participants"><i class="material-icons">people</i> Participants</a>
            <a href="/tickets"><i class="material-icons">confirmation_number</i> Tickets</a>
            <a href="/schedules"><i class="material-icons">schedule</i> Schedules</a>
            <a href="/organizers"><i class="material-icons">person</i> Organizers</a>
            <a href="/feedbacks"><i class="material-icons">feedback</i> Feedbacks</a>
            <a href="/logout" class="logout"><i class="material-icons">logout</i> Logout</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <h2>List of Feedbacks</h2>
        <a href="/feedbacks/create" class="add-feedback">
            <i class="material-icons">add</i>Add New Feedback
        </a>

        <?php if (!empty($feedbacks)): ?>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Event ID</th>
                        <th>User ID</th>
                        <th>Feedback</th>
                        <th>Rating</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($feedbacks as $feedback): ?>
                        <tr>
                            <td><?= esc($feedback['id']) ?></td>
                            <td><?= esc($feedback['event_id']) ?></td>
                            <td><?= esc($feedback['user_id']) ?></td>
                            <td><?= esc($feedback['feedback_text']) ?></td>
                            <td><?= esc($feedback['rating']) ?></td>
                            <td>
                                <a href="/feedbacks/edit/<?= esc($feedback['id']) ?>" class="edit-button">Edit</a>
                                <a href="/feedbacks/delete/<?= esc($feedback['id']) ?>" class="delete-button" onclick="return confirm('Are you sure you want to delete this feedback?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="/dashboard" class="back-button">
                <i class="material-icons">arrow_back</i>Back to Dashboard
            </a>
        <?php else: ?>
            <p class="no-data">No feedbacks found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
