@extends('layout.app')

@section('contenido')
<style>
    .success-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 20px;
    }

    .success-card {
        background: white;
        border-radius: 20px;
        padding: 40px;
        text-align: center;
        max-width: 500px;
        width: 100%;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        animation: fadeInUp 0.5s ease;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .checkmark-circle {
        width: 80px;
        height: 80px;
        background: #4caf50;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        animation: scaleIn 0.3s ease 0.2s both;
    }

    @keyframes scaleIn {
        from {
            transform: scale(0);
        }
        to {
            transform: scale(1);
        }
    }

    .checkmark {
        width: 40px;
        height: 40px;
        border-right: 4px solid white;
        border-bottom: 4px solid white;
        transform: rotate(45deg);
        margin-top: -8px;
    }

    .success-title {
        font-size: 28px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .success-message {
        font-size: 16px;
        color: #666;
        margin-bottom: 30px;
        line-height: 1.5;
    }

    .payment-details {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 30px;
        text-align: left;
    }

    .payment-details h3 {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-bottom: 15px;
        border-bottom: 2px solid #4caf50;
        padding-bottom: 5px;
        display: inline-block;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #e0e0e0;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        font-weight: 600;
        color: #555;
    }

    .detail-value {
        color: #333;
        font-weight: 500;
    }

    .btn-home {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 25px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
        text-decoration: none;
        display: inline-block;
    }

    .btn-home:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        color: white;
    }

    .btn-home:active {
        transform: translateY(0);
    }

    .payment-id {
        font-size: 12px;
        color: #999;
        margin-top: 20px;
    }
</style>

<div class="success-container">
    <div class="success-card">
        <div class="checkmark-circle">
            <div class="checkmark"></div>
        </div>
        
        <h1 class="success-title">¡Pago Exitoso!</h1>
        <p class="success-message">
            Tu transacción ha sido procesada correctamente.<br>
            En breve recibirás un correo de confirmación.
        </p>
        
        <div class="payment-details">
            <h3>Detalles del pago</h3>
            <div class="detail-row">
                <span class="detail-label">Monto:</span>
                <span class="detail-value" id="payment-amount">${{ number_format($total, 2) }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Método de pago:</span>
                <span class="detail-value" id="payment-method">Tarjeta de crédito</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Fecha:</span>
                <span class="detail-value" id="payment-date"></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Estado:</span>
                <span class="detail-value" style="color: #4caf50; font-weight: bold;">Aprobado</span>
            </div>
        </div>
        
        <a href="/checkout" class="btn-home">Realizar otra compra</a>
        
        <div class="payment-id" id="payment-reference">
            Referencia: Pago exitoso
        </div>
    </div>
</div>

@endsection