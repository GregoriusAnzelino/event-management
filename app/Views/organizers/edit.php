<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Organizer</title>
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
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h1 {
            color: #1abc9c; /* Warna aksen hijau cerah */
            margin-bottom: 20px;
            font-size: 2em;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 1.1em;
            color: #ecf0f1;
        }

        input,
        select {
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

        input:focus,
        select:focus {
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        button {
            padding: 12px 20px;
            background-color: #1abc9c; /* Warna hijau cerah */
            color: #34495e; /* Warna teks */
            border: none;
            border-radius: 30px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        button:hover {
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
        <h1>Edit Organizer</h1>
        <form action="/organizers/update/<?= esc($organizer['id']) ?>" method="post">
            <label for="event_id">Event:</label>
            <select id="event_id" name="event_id" required>
                <?php foreach ($events as $event): ?>
                    <option value="<?= esc($event['id']) ?>" <?= $event['id'] == $organizer['event_id'] ? 'selected' : '' ?>>
                        <?= esc($event['title']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= esc($organizer['name']) ?>" required>

            <label for="contact_info">Contact Info:</label>
            <input type="text" id="contact_info" name="contact_info" value="<?= esc($organizer['contact_info']) ?>" required>

            <button type="submit">Update</button>
        </form>
        <a href="/organizers" class="back-button">Back to List</a>
    </div>
</body>

</html>
