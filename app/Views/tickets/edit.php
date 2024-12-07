<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ticket</title>
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

        h1 {
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
        input[type="text"],
        input[type="number"],
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
        input[type="text"]:focus,
        input[type="number"]:focus {
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
        <h1>Edit Ticket #<?= esc($ticket['id']) ?></h1>
        <form action="/tickets/update/<?= esc($ticket['id']) ?>" method="post">
            <label for="event_id">Event:</label>
            <select name="event_id" id="event_id" required>
                <?php foreach ($events as $event): ?>
                    <option value="<?= esc($event['id']) ?>" <?= $event['id'] == $ticket['event_id'] ? 'selected' : '' ?>>
                        <?= esc($event['title']) ?> (<?= esc($event['date']) ?>)
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label for="participant_id">Participant:</label>
            <select name="participant_id" id="participant_id" required>
                <?php foreach ($participants as $participant): ?>
                    <option value="<?= esc($participant['id']) ?>" <?= $participant['id'] == $ticket['participant_id'] ? 'selected' : '' ?>>
                        <?= esc($participant['id']) ?> - <?= esc($participant['user_id']) ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label for="ticket_number">Ticket Number:</label>
            <input type="text" name="ticket_number" id="ticket_number" value="<?= esc($ticket['ticket_number']) ?>" required><br>

            <label for="ticket_price">Ticket Price:</label>
            <input type="number" name="ticket_price" id="ticket_price" step="0.01" value="<?= esc($ticket['ticket_price']) ?>" required><br>

            <input type="submit" value="Update">
        </form>
        <a href="/tickets" class="back-button">Back</a>
    </div>
</body>

</html>
