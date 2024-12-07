<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Participant</title>
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
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 600px;
            background-color: #34495e;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h2 {
            font-size: 2.2em;
            margin-bottom: 20px;
            color: #1abc9c;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 1.1em;
            text-align: left;
            color: #ecf0f1;
        }

        select {
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

        select:focus {
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        input[type="submit"] {
            padding: 12px 20px;
            background-color: #1abc9c;
            color: #34495e;
            border: none;
            border-radius: 30px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
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
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .back-button:hover {
            background-color: #c0392b;
            transform: translateY(-3px);
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Add New Participant</h2>
        <form action="/participants/create" method="post">
            <label for="user_id">User:</label>
            <select id="user_id" name="user_id" required>
                <option value="">--Select User--</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?= $user['id'] ?>"><?= $user['name'] ?> (ID: <?= $user['id'] ?>)</option>
                <?php endforeach; ?>
            </select>

            <label for="event_id">Event:</label>
            <select id="event_id" name="event_id" required>
                <option value="">--Select Event--</option>
                <?php foreach ($events as $event): ?>
                    <option value="<?= $event['id'] ?>"><?= $event['title'] ?> (ID: <?= $event['id'] ?>)</option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Add Participant">
        </form>

        <a href="/participants" class="back-button">Back</a>
    </div>
</body>

</html>
