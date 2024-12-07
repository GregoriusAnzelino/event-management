<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Feedback</title>
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
            max-width: 800px;
            background-color: #34495e; /* Warna latar belakang container */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h2 {
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

        select,
        textarea,
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

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        input[type="submit"] {
            background-color: #1abc9c; /* Warna hijau cerah */
            color: #34495e; /* Warna teks */
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 1.1em;
            padding: 10px 20px;
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
        <h2>Edit Feedback #<?= esc($feedback['id']) ?></h2>
        <form action="/feedbacks/update/<?= esc($feedback['id']) ?>" method="post">
            <label for="event_id">Event:</label>
            <select name="event_id" id="event_id" required>
                <?php foreach ($events as $event): ?>
                    <option value="<?= esc($event['id']) ?>" <?= $event['id'] == $feedback['event_id'] ? 'selected' : '' ?>>
                        <?= esc($event['title']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="user_id">User:</label>
            <select name="user_id" id="user_id" required>
                <?php foreach ($users as $user): ?>
                    <option value="<?= esc($user['id']) ?>" <?= $user['id'] == $feedback['user_id'] ? 'selected' : '' ?>>
                        <?= esc($user['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="feedback_text">Feedback Text:</label>
            <textarea name="feedback_text" id="feedback_text" required><?= esc($feedback['feedback_text']) ?></textarea>

            <label for="rating">Rating (1-5):</label>
            <input type="number" name="rating" id="rating" min="1" max="5" value="<?= esc($feedback['rating']) ?>" required>

            <input type="submit" value="Update Feedback">
        </form>
        <a href="/feedbacks" class="back-button">Back</a>
    </div>
</body>

</html>
