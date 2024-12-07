<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Participant</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #2c3e50; /* Latar belakang utama */
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
            background-color: #34495e; /* Warna latar belakang container */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #1abc9c; /* Warna aksen hijau cerah */
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

        select,
        input[type="submit"] {
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

        select:focus,
        input[type="submit"]:hover {
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
            margin-top: 20px;
            background-color: #555;
            padding: 10px 20px;
            border-radius: 30px;
            color: #fff;
            text-decoration: none;
            text-align: center;
            font-size: 1.1em;
            transition: background-color 0.3s, transform 0.3s;
        }

        .back-button:hover {
            background-color: #333;
            transform: translateY(-5px);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Participant #<?= esc($participant['id']) ?></h1>
        <form action="/participants/update/<?= esc($participant['id']) ?>" method="post">
            <label for="user_id">User:</label>
            <select id="user_id" name="user_id" required>
                <?php foreach ($users as $user): ?>
                    <option value="<?= esc($user['id']) ?>" <?= $user['id'] == $participant['user_id'] ? 'selected' : '' ?>>
                        <?= esc($user['name']) ?> (ID: <?= esc($user['id']) ?>)
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="event_id">Event:</label>
            <select id="event_id" name="event_id" required>
                <?php foreach ($events as $event): ?>
                    <option value="<?= esc($event['id']) ?>" <?= $event['id'] == $participant['event_id'] ? 'selected' : '' ?>>
                        <?= esc($event['title']) ?> (ID: <?= esc($event['id']) ?>)
                    </option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Update Participant">
        </form>

        <a href="/participants" class="back-button">Back</a>
    </div>
</body>

</html>
