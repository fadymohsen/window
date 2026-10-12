<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Request</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; color: #222; }
        .wrapper { max-width: 600px; margin: 40px auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,.1); }
        .header { background: #1f1f1f; padding: 28px 32px; text-align: center; }
        .header img { height: 50px; }
        .header h1 { color: #f9a11b; margin: 12px 0 0; font-size: 1.3rem; }
        .body { padding: 32px; }
        .label { font-size: 0.78rem; font-weight: 700; text-transform: uppercase; color: #888; margin-bottom: 2px; }
        .value { font-size: 1rem; color: #222; margin-bottom: 18px; }
        .badge { display: inline-block; background: #f9a11b; color: #1f1f1f; font-weight: 700; font-size: 0.8rem; padding: 3px 10px; border-radius: 20px; }
        .footer { background: #f4f4f4; padding: 16px 32px; font-size: 0.78rem; color: #aaa; text-align: center; }
        hr { border: none; border-top: 1px solid #eee; margin: 20px 0; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1>New Contact Request</h1>
    </div>
    <div class="body">
        <p style="margin-top:0;">You have received a new inquiry through the website contact form.</p>
        <hr>

        <div class="label">Full Name</div>
        <div class="value">{{ $contact->full_name }}</div>

        <div class="label">Email</div>
        <div class="value"><a href="mailto:{{ $contact->email }}" style="color:#f9a11b;">{{ $contact->email }}</a></div>

        <div class="label">Phone Number</div>
        <div class="value"><a href="tel:{{ $contact->phone_number }}" style="color:#f9a11b;">{{ $contact->phone_number }}</a></div>

        @if($contact->service)
        <div class="label">Service Requested</div>
        <div class="value"><span class="badge">{{ $contact->service }}</span></div>
        @endif

        @if($contact->message)
        <div class="label">Message</div>
        <div class="value" style="white-space: pre-wrap; background:#f9f9f9; padding:12px; border-radius:6px; border:1px solid #eee;">{{ $contact->message }}</div>
        @endif

        <hr>
        <p style="font-size:0.85rem; color:#888; margin-bottom:0;">
            Submitted on {{ $contact->created_at->format('d M Y, H:i') }} &nbsp;|&nbsp;
            Status: <strong>{{ $contact->status }}</strong>
        </p>
    </div>
    <div class="footer">
        Window Advertising &copy; {{ date('Y') }} &nbsp;&mdash;&nbsp; windowadv.com
    </div>
</div>
</body>
</html>
