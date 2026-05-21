<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            line-height: 1.6;
            color: #334155;
            background-color: #ffffff;
            margin: 0;
            padding: 8px;
            -webkit-font-smoothing: antialiased;
        }

        .container {
            max-width: 100%;
        }

        h1 {
            font-weight: 800;
            color: #0f172a;
            font-size: 24px;
            margin-top: 0;
            margin-bottom: 24px;
            letter-spacing: -0.025em;
        }

        .content {
            font-size: 15px;
        }

        .point {
            display: flex;
            gap: 16px;
            margin-bottom: 16px;
        }

        .number {
            flex-shrink: 0;
            width: 28px;
            height: 28px;
            background: #f1f5f9;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            color: #15803d;
            margin-top: 2px;
            border: 1px solid #e2e8f0;
        }

        .text {
            flex: 1;
            font-weight: 500;
            color: #475569;
        }

        /* Custom styles for mobile webview */
        @media (max-width: 640px) {
            body {
                padding: 16px;
            }

            h1 {
                font-size: 20px;
                margin-bottom: 20px;
            }

            .point {
                gap: 12px;
                margin-bottom: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>{{ $title }}</h1>
        <div class="content">
            @php
                $points = array_filter(array_map('trim', explode("\n", $content)));
            @endphp

            @foreach($points as $index => $point)
                <div class="point" style="animation-delay: {{ $index * 50 }}ms">
                    <div class="number">{{ $index + 1 }}</div>
                    <div class="text">{{ $point }}</div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>