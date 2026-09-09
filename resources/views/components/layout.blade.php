<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Nihongo Roulette' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(180deg, #006d77 0%, #83c5be 50%, #edf6f9 100%);
            min-height: 100vh;
            color: #fff;
            overflow-x: hidden;
            position: relative;
        }

        /* ====== ANIMASI OMBAK ====== */
        .ocean {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 120px;
            z-index: 0;
            pointer-events: none;
        }

        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 200%;
            height: 100%;
            background: repeat-x;
            animation: waveMove 8s linear infinite;
        }

        .wave1 {
            background: radial-gradient(circle at 10px 15px, rgba(255,255,255,0.3) 8px, transparent 9px);
            background-size: 40px 40px;
            animation-duration: 8s;
            opacity: 0.5;
        }

        .wave2 {
            background: radial-gradient(circle at 20px 20px, rgba(255,255,255,0.2) 10px, transparent 11px);
            background-size: 60px 60px;
            animation-duration: 10s;
            animation-direction: reverse;
            opacity: 0.3;
        }

        @keyframes waveMove {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* ====== BUBBLES ====== */
        .bubble {
            position: fixed;
            bottom: -50px;
            width: 20px;
            height: 20px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            animation: bubbleUp linear infinite;
            z-index: 0;
            pointer-events: none;
        }

        @keyframes bubbleUp {
            0% { transform: translateY(0) scale(1); opacity: 0.6; }
            50% { opacity: 0.3; }
            100% { transform: translateY(-80vh) scale(1.5); opacity: 0; }
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
            padding: 2rem;
            position: relative;
            z-index: 1;
        }

        .card {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(15px);
            border-radius: 24px;
            padding: 2rem;
            border: 1px solid rgba(255,255,255,0.3);
            box-shadow: 0 10px 40px rgba(0,109,119,0.3);
        }
    </style>
</head>
<body>
    {{-- Ombak --}}
    <div class="ocean">
        <div class="wave wave1"></div>
        <div class="wave wave2"></div>
    </div>

    {{-- Bubbles --}}
    <div class="bubble" style="left:10%; animation-duration:8s;"></div>
    <div class="bubble" style="left:25%; animation-duration:10s; width:15px; height:15px;"></div>
    <div class="bubble" style="left:40%; animation-duration:7s;"></div>
    <div class="bubble" style="left:55%; animation-duration:12s; width:25px; height:25px;"></div>
    <div class="bubble" style="left:70%; animation-duration:9s;"></div>
    <div class="bubble" style="left:85%; animation-duration:11s; width:18px; height:18px;"></div>

    <x-navbar />

    <main>
        {{ $slot }}
    </main>
</body>
</html>