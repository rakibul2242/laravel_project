<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elaris Heights - Property Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }
        .email-container {
            max-width: 650px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            background-color: #2d6a4f;
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .hero-image {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .main-content {
            padding: 20px 0;
            color: #333333;
            line-height: 1.6;
        }
        .main-content h2 {
            color: #2d6a4f;
        }
        .main-content p {
            margin: 15px 0;
        }
        .feature-boxes {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        .feature-box {
            width: 48%;
            background-color: #f1f1f1;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }
        .feature-box h3 {
            color: #2d6a4f;
            margin-bottom: 10px;
        }
        .feature-box p {
            font-size: 14px;
            color: #777777;
        }
        .button {
            display: inline-block;
            background-color: #2d6a4f;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #777777;
            padding-top: 30px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Exclusive Updates on Elaris Heights</h1>
        </div>
        <div class="main-content">
            <h2>Dear 'recipient_name',</h2>
            <p>{{ $greeting_text ?? 'Thank you for being a part of the Elaris Heights community. We’re excited to share some important updates about the property you are interested in.' }}</p>
            
            <h3>Latest Features & Highlights</h3>
            <div class="feature-boxes">
                <div class="feature-box">
                    <h3>Modern Apartments</h3>
                    <p>Explore our newly designed apartments with state-of-the-art facilities.</p>
                </div>
                <div class="feature-box">
                    <h3>Prime Location</h3>
                    <p>Located at the heart of the city, with easy access to all amenities.</p>
                </div>
            </div>

            @if(isset($cta_url) && isset($cta_text))
                <a href="{{ $cta_url }}" class="button">{{ $cta_text }}</a>
            @endif
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Elaris Heights. All Rights Reserved.</p>
            <p>If you have any questions or need further assistance, feel free to contact us at <a href="mailto:info@elarisheights.com">info@elarisheights.com</a>.</p>
        </div>
    </div>
</body>
</html>
