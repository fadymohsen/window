<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>We received your message</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; color: #222; }
        .wrapper { max-width: 600px; margin: 40px auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,.1); }
        .header { background: #1f1f1f; padding: 28px 32px; text-align: center; }
        .header h1 { color: #f9a11b; margin: 0; font-size: 1.4rem; }
        .header p { color: #ccc; margin: 8px 0 0; font-size: 0.9rem; }
        .body { padding: 32px; }
        .highlight-box { background: #1f1f1f; border-radius: 8px; padding: 20px 24px; margin: 24px 0; }
        .highlight-box .label { font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: #888; margin-bottom: 2px; }
        .highlight-box .value { font-size: 0.95rem; color: #fff; margin-bottom: 12px; }
        .highlight-box .value:last-child { margin-bottom: 0; }
        .badge { display: inline-block; background: #f9a11b; color: #1f1f1f; font-weight: 700; font-size: 0.8rem; padding: 3px 10px; border-radius: 20px; }
        .cta { display: block; text-align: center; margin: 28px auto; background: #f9a11b; color: #1f1f1f; font-weight: 700; font-size: 1rem; padding: 14px 32px; border-radius: 6px; text-decoration: none; max-width: 220px; }
        .footer { background: #f4f4f4; padding: 16px 32px; font-size: 0.78rem; color: #aaa; text-align: center; }
        hr { border: none; border-top: 1px solid #eee; margin: 20px 0; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1>Window Advertising</h1>
        <p>Thank you for reaching out!</p>
    </div>
    <div class="body">
        <p style="margin-top:0;">Dear <strong>{{ $contact->full_name }}</strong>,</p>
        <p>We have successfully received your inquiry. Our team will review your request and get back to you as soon as possible — usually within 24 business hours.</p>

        <div class="highlight-box">
            <div class="label">Your Name</div>
            <div class="value">{{ $contact->full_name }}</div>

            <div class="label">Phone</div>
            <div class="value">{{ $contact->phone_number }}</div>

            @if($contact->service)
            <div class="label">Service</div>
            <div class="value"><span class="badge">{{ $contact->service }}</span></div>
            @endif

            @if($contact->message)
            <div class="label">Your Message</div>
            <div class="value" style="white-space: pre-wrap;">{{ $contact->message }}</div>
            @endif
        </div>

        <p>In the meantime, feel free to browse our portfolio or follow us on social media.</p>

        <a class="cta" href="https://windowadv.com">Visit Our Website</a>

        <hr>
        <p style="font-size:0.85rem; color:#888; margin-bottom:0;">
            If you did not submit this request, please ignore this email.
        </p>
    </div>
    <div class="footer">
        Window Advertising &copy; {{ date('Y') }} &nbsp;&mdash;&nbsp; windowadv.com<br>
        Riyadh, Saudi Arabia
    </div>
</div>
</body>
</html>
