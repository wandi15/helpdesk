<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Penutupan Tiket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }
        .content {
            background: #f9fafb;
            padding: 30px;
            border: 1px solid #e5e7eb;
        }
        .ticket-info {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #667eea;
        }
        .info-row {
            display: flex;
            margin: 10px 0;
            padding: 8px 0;
            border-bottom: 1px solid #f3f4f6;
        }
        .info-label {
            font-weight: bold;
            color: #6b7280;
            width: 120px;
        }
        .info-value {
            color: #111827;
        }
        .button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 40px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            margin: 20px 0;
            text-align: center;
        }
        .button:hover {
            opacity: 0.9;
        }
        .footer {
            background: #f3f4f6;
            padding: 20px;
            border-radius: 0 0 10px 10px;
            text-align: center;
            font-size: 12px;
            color: #6b7280;
        }
        .warning {
            background: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 style="margin: 0;">🎫 Konfirmasi Penutupan Tiket</h1>
    </div>

    <div class="content">
        <p>Halo <strong>{{ $ticket->user->name }}</strong>,</p>

        <p>Tiket Anda telah selesai ditangani dan siap untuk ditutup. Silakan konfirmasi penutupan tiket dengan mengklik tombol di bawah ini:</p>

        <div class="ticket-info">
            <h3 style="margin-top: 0; color: #667eea;">📋 Informasi Tiket</h3>
            
            <div class="info-row">
                <div class="info-label">ID Tiket:</div>
                <div class="info-value">#{{ $ticket->_id }}</div>
            </div>
            
            <div class="info-row">
                <div class="info-label">Judul:</div>
                <div class="info-value">{{ $ticket->title }}</div>
            </div>
            
            <div class="info-row">
                <div class="info-label">Divisi:</div>
                <div class="info-value">{{ $ticket->division }}</div>
            </div>
            
            <div class="info-row">
                <div class="info-label">Prioritas:</div>
                <div class="info-value">
                    <span style="
                        background: {{ $ticket->priority === 'high' ? '#fee2e2' : ($ticket->priority === 'medium' ? '#fed7aa' : '#f3f4f6') }};
                        color: {{ $ticket->priority === 'high' ? '#991b1b' : ($ticket->priority === 'medium' ? '#9a3412' : '#374151') }};
                        padding: 4px 12px;
                        border-radius: 12px;
                        font-size: 12px;
                        font-weight: bold;
                    ">
                        {{ strtoupper($ticket->priority) }}
                    </span>
                </div>
            </div>
            
            <div class="info-row" style="border-bottom: none;">
                <div class="info-label">Dibuat:</div>
                <div class="info-value">{{ $ticket->created_at->format('d M Y, H:i') }}</div>
            </div>
        </div>

        <div style="text-align: center;">
            <a href="{{ $confirmationUrl }}" class="button">
                ✓ Konfirmasi Penutupan Tiket
            </a>
        </div>

        <div class="warning">
            <strong>⚠️ Penting:</strong> Dengan mengkonfirmasi penutupan tiket ini, Anda menyatakan bahwa masalah telah diselesaikan dengan memuaskan. Anda akan diminta untuk memberikan tanda tangan digital dan catatan (opsional).
        </div>

        <p style="color: #6b7280; font-size: 14px;">
            Jika Anda tidak merasa tiket ini sudah selesai atau memiliki pertanyaan, silakan hubungi tim support kami.
        </p>
    </div>

    <div class="footer">
        <p style="margin: 5px 0;">
            Email ini dikirim secara otomatis, mohon tidak membalas email ini.
        </p>
        <p style="margin: 5px 0;">
            © {{ date('Y') }} Helpdesk System. All rights reserved.
        </p>
    </div>
</body>
</html>
