<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Message</title>
</head>
<body>
    <h1>New Contact Message</h1>

    <p><strong>Name:</strong> {{ $contactMessage->name }}</p>
    <p><strong>Email:</strong> {{ $contactMessage->email }}</p>
    <p><strong>Phone:</strong> {{ $contactMessage->phone }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $contactMessage->message }}</p>

    <p>Thank you.</p>
</body>
</html>
