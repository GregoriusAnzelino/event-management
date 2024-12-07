<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Event</title>
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
        }

        .styled-table tr:nth-child(even) {
            background-color: #2c3e50;
        }

        .styled-table tr:hover {
            background-color: #1e2a33;
        }

        .no-data {
            text-align: center;
            font-style: italic;
            color: #bdc3c7;
        }

        /* Tombol */
        .action-bar {
            margin: 20px 0;
            text-align: center;
        }

        .add-event-btn {
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: #ecf0f1;
            background-color: #1abc9c;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: background-color 0.3s, transform 0.3s;
            cursor: pointer;
        }

        .add-event-btn:hover {
            background-color: #16a085;
            transform: translateY(-2px);
        }

        .edit-button,
        .delete-button {
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
            color: #ecf0f1;
            display: inline-block;
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
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

        .btn-back {
            display: block;
            margin: 20px auto;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: #ecf0f1;
            background-color: #1abc9c;
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-back:hover {
            background-color: #16a085;
            transform: translateY(-2px);
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
        <h2 style="text-align: center;">List of Events</h2>

        <!-- Tombol untuk menambah event baru -->
        <div class="action-bar">
            <a href="/events/create" class="add-event-btn">
                <i class="material-icons">add</i> Add New Event
            </a>
        </div>

        <?php if (!empty($events) && is_array($events)): ?>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Organizer</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($events as $event): ?>
                        <tr>
                            <td><?= esc($event['id']) ?></td>
                            <td><?= esc($event['title']) ?></td>
                            <td><?= esc($event['description']) ?></td>
                            <td><?= esc($event['location']) ?></td>
                            <td><?= esc($event['date']) ?></td>
                            <td><?= esc($event['organizer_name']) ?></td>
                            <td>
                                <a href="/events/edit/<?= esc($event['id']) ?>" class="edit-button">Edit</a>
                                <a href="/events/delete/<?= esc($event['id']) ?>" class="delete-button" onclick="return confirm('Are you sure you want to delete this event?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-data">No events found.</p>
        <?php endif; ?>

        <!-- Tombol kembali ke Dashboard -->
        <!-- Tombol kembali ke Dashboard -->
        <div class="action-bar">
            <a href="/dashboard" class="add-event-btn">
                <i class="material-icons">arrow_back</i> Back to Dashboard
            </a>
        </div>

    </div>
</body>

</html>