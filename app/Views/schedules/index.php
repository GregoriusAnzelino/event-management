<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedules</title>
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
            text-align: center;
            font-style: italic;
            color: #bdc3c7;
        }

        .add-participant {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: #ecf0f1;
            background-color: #1abc9c;
            margin-bottom: 15px;
            text-align: center;
            display: block;
            transition: background-color 0.3s, transform 0.3s;
        }

        .add-participant:hover {
            background-color: #16a085;
            transform: translateY(-2px);
        }

        /* Gaya tambahan untuk tombol "Back" */
        .back-button {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: #ecf0f1;
            background-color: #1abc9c;
            margin-top: 15px;
            display: block;
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
        }

        .back-button:hover {
            background-color: #16a085;
            transform: translateY(-2px);
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
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

    <div class="container">
        <h2 style="text-align: center;">List of Schedules</h2>
        <div class="button-container">
            <a href="/schedules/create" class="add-participant">
                <i class="material-icons">add</i> Add New Schedule
            </a>
        </div>
        <br><br>

        <?php if (!empty($schedules)): ?>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Event ID</th>
                        <th>Schedule Date</th>
                        <th>Activity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($schedules as $schedule): ?>
                        <tr>
                            <td><?= esc($schedule['id']) ?></td>
                            <td><?= esc($schedule['event_id']) ?></td>
                            <td><?= esc($schedule['schedule_date']) ?></td>
                            <td><?= esc($schedule['activity']) ?></td>
                            <td class="action-buttons">
                                <a class="edit-button" href="/schedules/edit/<?= esc($schedule['id']) ?>">Edit</a>
                                <a class="delete-button" href="/schedules/delete/<?= esc($schedule['id']) ?>" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-data">No schedules found.</p>
        <?php endif; ?>

        <div class="button-container">
            <a href="/dashboard" class="back-button">
                <i class="material-icons">arrow_back</i> Back to Dashboard
            </a>
        </div>
    </div>
</body>

</html>