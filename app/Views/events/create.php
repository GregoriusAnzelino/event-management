<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Event</title>
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

        h3 {
            margin-top: 30px;
            font-size: 1.5em;
            color: #f1c40f;
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
        textarea {
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
            min-height: 100px;
        }

        input::placeholder,
        textarea::placeholder {
            color: #bdc3c7;
        }

        input:focus,
        textarea:focus {
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        button {
            padding: 12px 20px;
            background-color: #1abc9c;
            color: #34495e;
            border: none;
            border-radius: 30px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
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
        <h2>Add New Event</h2>
        <form action="/events/create" method="post">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required placeholder="Enter event title">

            <label for="description">Description:</label>
            <textarea name="description" id="description" required placeholder="Enter event description"></textarea>

            <label for="date">Date:</label>
            <input type="date" name="date" id="date" required>

            <label for="location">Location:</label>
            <input type="text" name="location" id="location" required placeholder="Enter event location">

            <h3>Add Organizer</h3>
            <label for="organizer_name">Organizer Name:</label>
            <input type="text" name="organizer_name" id="organizer_name" required placeholder="Enter organizer name">

            <label for="organizer_contact">Organizer Contact Info:</label>
            <input type="text" name="organizer_contact" id="organizer_contact" required placeholder="Enter contact info">

            <button type="submit">Save Event & Organizer</button>
        </form>

        <!-- Back Button -->
        <a href="/events" class="back-button">Back to Events</a>
    </div>
</body>

</html>
