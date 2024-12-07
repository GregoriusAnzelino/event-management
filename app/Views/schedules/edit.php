<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Schedule</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #2c3e50; /* Warna latar belakang utama */
            color: #ecf0f1;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 90%;
            max-width: 600px;
            background-color: #34495e; /* Warna latar belakang container */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #1abc9c; /* Warna aksen hijau */
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.1em;
            color: #ecf0f1;
        }

        select,
        input[type="date"],
        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: none;
            background-color: rgba(255, 255, 255, 0.1);
            color: #ecf0f1;
            font-size: 1em;
            outline: none;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        select:focus,
        input[type="submit"]:hover,
        input[type="date"]:focus,
        input[type="text"]:focus {
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        input[type="submit"] {
            background-color: #1abc9c; /* Warna hijau cerah */
            color: #34495e; /* Warna teks */
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #16a085; /* Warna hijau gelap saat hover */
            transform: translateY(-3px);
        }

        .back-button {
            display: block;
            background-color: #e74c3c; /* Warna aksen merah */
            color: #ecf0f1;
            padding: 10px 20px;
            border-radius: 30px;
            text-decoration: none;
            text-align: center;
            font-size: 1.1em;
            margin-top: 20px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .back-button:hover {
            background-color: #c0392b; /* Warna merah gelap saat hover */
            transform: translateY(-3px);
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Schedule #<?= esc($schedule['id']) ?></h2>
        <form action="/schedules/update/<?= esc($schedule['id']) ?>" method="post">
            <label for="event_id">Event:</label>
            <select name="event_id" id="event_id" required>
                <?php foreach ($events as $event): ?>
                    <option value="<?= esc($event['id']) ?>" <?= $event['id'] == $schedule['event_id'] ? 'selected' : '' ?>>
                        <?= esc($event['title']) ?> (<?= esc($event['date']) ?>)
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label for="schedule_date">Schedule Date:</label>
            <input type="date" name="schedule_date" id="schedule_date" value="<?= esc($schedule['schedule_date']) ?>" required><br>

            <label for="activity">Activity:</label>
            <input type="text" name="activity" id="activity" value="<?= esc($schedule['activity']) ?>" required><br>

            <input type="submit" value="Update Schedule">
        </form>

        <a href="/schedules" class="back-button">Back</a>
    </div>
</body>

</html>
