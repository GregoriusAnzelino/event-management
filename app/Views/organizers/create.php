<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Organizer</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(120deg, #1abc9c, #16a085);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #f1c40f;
            margin-bottom: 20px;
        }

        form {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            width: 100%;
            max-width: 500px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
            color: #333;
        }

        button {
            background-color: #555;
            color: #f1c40f;
            padding: 10px 20px;
            border-radius: 30px;
            border: none;
            cursor: pointer;
            display: block;
            width: 100%;
            transition: background-color 0.3s, transform 0.3s;
        }

        button:hover {
            background-color: #333;
            transform: translateY(-5px);
        }

        a {
            display: block;
            background-color: #555;
            color: #f1c40f;
            text-align: center;
            padding: 10px 20px;
            border-radius: 30px;
            text-decoration: none;
            width: 200px;
            margin: 20px auto;
            transition: background-color 0.3s, transform 0.3s;
        }

        a:hover {
            background-color: #333;
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <h1>Add New Organizer</h1>
    <form action="/organizers/create" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        
        <label for="contact_info">Contact Info:</label>
        <input type="text" name="contact_info" id="contact_info" required>
        
        <label for="event_id">Event:</label>
        <select name="event_id" id="event_id">
            <?php foreach ($events as $event): ?>
                <option value="<?= esc($event['id']) ?>"><?= esc($event['title']) ?></option>
            <?php endforeach; ?>
        </select>
        
        <button type="submit">Save</button>
    </form>
    <a href="/organizers">Back to List</a>
</body>
</html>
