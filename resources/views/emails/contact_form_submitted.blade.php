<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact Form Submission</title>
    <style>
        /* Add some basic styling */
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { background-color: #ffffff; padding: 20px; border-radius: 5px; }
        h2 { color: #333333; }
        p { color: #555555; }
        .footer { margin-top: 20px; font-size: 12px; color: #aaaaaa; }
    </style>
</head>
<body>
    <div class="container">
        <h2>New Contact Form Submission</h2>
        <p><strong>Name:</strong> {{ $contact->first_name }} {{ $contact->last_name }}</p>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
        @if($contact->phone_number)
        <p><strong>Phone Number:</strong> {{ $contact->phone_number }}</p>
        @endif
        <p><strong>Subject:</strong> {{ $contact->subject }}</p>
        <p><strong>Message:</strong></p>
        <p>{{ $contact->message }}</p>
    </div>
    <div class="footer">
        <p>This email was sent from your website's contact form.our be representative will reach you soon</p>
    </div>
</body>
</html>
