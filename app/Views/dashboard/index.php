<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/assets/css/dashboard.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
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

    <div class="content">
        <div class="card">
            <i class="material-icons">event</i>
            <h2><?= $totalEvents ?></h2>
            <p>Events</p>
        </div>
        <div class="card">
            <i class="material-icons">people</i>
            <h2><?= $totalParticipants ?></h2>
            <p>Participants</p>
        </div>
        <div class="card">
            <i class="material-icons">confirmation_number</i>
            <h2><?= $totalTickets ?></h2>
            <p>Tickets</p>
        </div>
        <div class="card">
            <i class="material-icons">schedule</i>
            <h2><?= $totalSchedules ?></h2>
            <p>Schedules</p>
        </div>
        <div class="card">
            <i class="material-icons">person</i>
            <h2><?= $totalOrganizers ?></h2>
            <p>Organizers</p>
        </div>
        <div class="card">
            <i class="material-icons">feedback</i>
            <h2><?= $totalFeedbacks ?></h2>
            <p>Feedbacks</p>
        </div>
    </div>
</body>
</html>
