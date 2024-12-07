<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <style>
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

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #1abc9c; /* Aksen hijau cerah */
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

        input[type="text"],
        input[type="date"],
        textarea,
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

        textarea {
            resize: vertical;
        }

        input::placeholder,
        textarea::placeholder {
            color: #bdc3c7;
        }

        input:focus,
        textarea:focus,
        select:focus {
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        button {
            padding: 12px 20px;
            background-color: #1abc9c; /* Aksen hijau cerah */
            color: #34495e; /* Warna teks */
            border: none;
            border-radius: 30px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #16a085; /* Warna hijau gelap saat hover */
            transform: translateY(-3px);
        }

        a {
            color: #f1c40f; /* Warna aksen kuning cerah */
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #e67e22; /* Warna aksen oranye saat hover */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Event</h1>

        <form action="/events/update/<?= esc($event['id']) ?>" method="post">
            <label for="title">Judul Event:</label>
            <input type="text" name="title" id="title" value="<?= esc($event['title']) ?>" placeholder="Masukkan judul event" required>

            <label for="description">Deskripsi:</label>
            <textarea name="description" id="description" placeholder="Masukkan deskripsi event" required><?= esc($event['description']) ?></textarea>

            <label for="date">Tanggal:</label>
            <input type="date" name="date" id="date" value="<?= esc($event['date']) ?>" required>

            <label for="location">Lokasi:</label>
            <input type="text" name="location" id="location" value="<?= esc($event['location']) ?>" placeholder="Masukkan lokasi event" required>

            <label for="organizer">Organizer:</label>
            <select name="organizer" id="organizer" required>
                <option value="">Pilih Organizer</option>
                <?php foreach ($organizers as $organizer): ?>
                    <option value="<?= esc($organizer['id']) ?>" <?= $organizer['id'] == $event['organizer_id'] ? 'selected' : '' ?>>
                        <?= esc($organizer['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Update Event</button>
        </form>

        <a href="/events">Kembali ke Daftar Event</a>
    </div>
</body>

</html>
