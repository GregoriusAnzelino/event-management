<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Schedule</title>
    <style>
        /* Gaya umum dan reset */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #2c3e50;
            color: #ecf0f1;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #1abc9c;
            margin-bottom: 20px;
        }

        form {
            background-color: #34495e;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 600px;
        }

        label {
            font-size: 1.1em;
            margin-bottom: 5px;
            display: block;
            color: #ecf0f1;
        }

        input, select {
            padding: 12px;
            border-radius: 8px;
            border: none;
            font-size: 1em;
            background-color: rgba(255, 255, 255, 0.1);
            color: #ecf0f1;
            width: 100%;
            outline: none;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        input[type="submit"] {
            background-color: #1abc9c;
            color: #34495e;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background-color 0.3s, transform 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #16a085;
            transform: translateY(-3px);
        }

        .back-button {
            background-color: #e74c3c;
            color: #ecf0f1;
            padding: 10px 20px;
            border-radius: 30px;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
        }

        .back-button:hover {
            background-color: #c0392b;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <h2>Add New Schedule</h2>
    <form action="/schedules/create" method="post">
        <label for="event_id">Event:</label>
        <select name="event_id" id="event_id" required>
            <option value="">--Select Event--</option>
            <?php foreach ($events as $event): ?>
                <option value="<?= esc($event['id']) ?>"><?= esc($event['title']) ?> (<?= esc($event['date']) ?>)</option>
            <?php endforeach; ?>
        </select>

        <label for="schedule_date">Schedule Date:</label>
        <input type="date" name="schedule_date" id="schedule_date" required>

        <label for="activity">Activity:</label>
        <input type="text" name="activity" id="activity" required>

        <input type="submit" value="Add Schedule">
    </form>

    <a href="/schedules" class="back-button">Back</a>
</body>
</html>
