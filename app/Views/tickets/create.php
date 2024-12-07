<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Ticket</title>
    <style>
        /* Gaya umum dan reset */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #2c3e50;
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
            max-width: 800px;
            background-color: #34495e;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h2 {
            color: #1abc9c;
            margin-bottom: 20px;
            font-size: 2em;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 1.1em;
            color: #ecf0f1;
        }

        select,
        input {
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

        input[type="submit"] {
            background-color: #1abc9c;
            color: #34495e;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 1.1em;
            padding: 10px 20px;
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
    <div class="container">
        <h2>Add New Ticket</h2>
        <form action="/tickets/create" method="post">
            <label for="event_id">Event:</label>
            <select id="event_id" name="event_id" required>
                <option value="">--Select Event--</option>
                <?php foreach ($events as $event): ?>
                    <option value="<?= esc($event['id']) ?>"><?= esc($event['title']) ?> (<?= esc($event['date']) ?>)</option>
                <?php endforeach; ?>
            </select>

            <label for="participant_id">Participant:</label>
            <select id="participant_id" name="participant_id" required>
                <option value="">--Select Participant--</option>
                <?php foreach ($participants as $participant): ?>
                    <option value="<?= esc($participant['id']) ?>"><?= esc($participant['user_id']) ?></option>
                <?php endforeach; ?>
            </select>

            <label for="ticket_number">Ticket Number:</label>
            <input type="text" id="ticket_number" name="ticket_number" required>

            <label for="ticket_price">Ticket Price:</label>
            <input type="text" id="ticket_price" name="ticket_price" required>

            <input type="submit" value="Add Ticket">
        </form>
        <a href="/tickets" class="back-button">Back</a>
    </div>
</body>
</html>
