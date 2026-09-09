<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Nihongo Roulette' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(160deg, #0a3d62 0%, #0c4a6e 30%, #075985 60%, #0284c7 100%);
            min-height: 100vh;
            color: #f0f9ff;
            overflow-x: hidden;
            position: relative;
        }

        /* Gelembung halus di samping */
        .bubble {
            position: fixed;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            pointer-events: none;
            z-index: 0;
            animation: floatBubble ease-in-out infinite;
        }

        @keyframes floatBubble {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-30px) scale(1.05); }
        }

        /* Ombak halus di bawah */
        .ocean {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 80px;
            z-index: 0;
            pointer-events: none;
        }

        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 200%;
            height: 100%;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 50% 50% 0 0;
            animation: waveMove 12s linear infinite;
        }

        .wave:nth-child(2) {
            animation-duration: 8s;
            animation-direction: reverse;
            opacity: 0.5;
        }

        @keyframes waveMove {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
            z-index: 1;
        }

        .card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 8px 32px rgba(2, 132, 199, 0.2);
        }

        .btn-primary {
            background: linear-gradient(135deg, #0284c7, #0369a1);
            color: #ffffff;
            border: none;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(2, 132, 199, 0.3);
        }

        .text-muted { color: #bae6fd; }
        .text-white { color: #ffffff; }
        .text-accent { color: #7dd3fc; }
    </style>
</head>
<body>
    {{-- Gelembung di samping, jarang, ukuran beda --}}
    <div class="bubble" style="left:3%; top:70%; width:12px; height:12px; animation-duration:9s;"></div>
    <div class="bubble" style="left:5%; top:30%; width:8px; height:8px; animation-duration:11s; animation-delay:2s;"></div>
    <div class="bubble" style="right:4%; top:60%; width:15px; height:15px; animation-duration:10s; animation-delay:1s;"></div>
    <div class="bubble" style="right:6%; top:25%; width:10px; height:10px; animation-duration:12s; animation-delay:3s;"></div>
    <div class="bubble" style="left:7%; top:80%; width:6px; height:6px; animation-duration:8s; animation-delay:4s;"></div>

    {{-- Ombak halus --}}
    <div class="ocean">
        <div class="wave"></div>
        <div class="wave"></div>
    </div>

    <x-navbar />

    <main>
        {{ $slot }}
    </main>
</body>
</html>