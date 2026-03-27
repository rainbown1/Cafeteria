@extends('layout.app')

@section('contenido')
<style>
    #form-checkout {
        display: flex;
        flex-direction: column;
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        gap: 15px;
    }

    .container {
        height: 40px;
        display: block;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 8px 12px;
        width: 100%;
    }

    /* Estilos para todos los campos */
    #form-checkout input,
    #form-checkout select {
        height: 40px;
        padding: 8px 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        width: 100%;
    }

    #form-checkout button {
        background-color: #009ee3;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 10px;
    }

    #form-checkout button:hover {
        background-color: #0073b7;
    }

    .progress-bar {
        margin-top: 10px;
        width: 100%;
    }

    /* Asegurar que los campos de identificación sean visibles */
    #form-checkout__identificationType,
    #form-checkout__identificationNumber {
        display: block !important;
        visibility: visible !important;
    }
</style>

<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-2xl shadow-xl max-w-md w-full">
        <h1 class="text-2xl font-bold mb-4 text-center">Finalizar Compra</h1>
        <p class="text-gray-600 mb-6 text-center">Monto a pagar: <strong>${{ number_format($total, 2) }}</strong></p>
        
        <form id="form-checkout">
            <div id="form-checkout__cardNumber" class="container"></div>
            <div id="form-checkout__expirationDate" class="container"></div>
            <div id="form-checkout__securityCode" class="container"></div>
            
            <input type="text" id="form-checkout__cardholderName" placeholder="Titular de la tarjeta" />
            
            <input type="text" id="form-checkout__identificationType" placeholder="Número de identificación (DNI, CPF, etc.)" />            
            
            <input type="text" id="form-checkout__identificationNumber" placeholder="Número de identificación" />
            
            <select id="form-checkout__issuer"></select>
            <select id="form-checkout__installments"></select>
            
            <input type="email" id="form-checkout__cardholderEmail" placeholder="E-mail" />

            <button type="submit" id="form-checkout__submit">Pagar</button>
            <progress value="0" class="progress-bar">Cargando...</progress>
        </form>
    </div>
</div>


<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    const mp = new MercadoPago("{{ $publicKey }}");
    
   const cardForm = mp.cardForm({
      amount: "{{ $total }}",
      iframe: true,
      form: {
        id: "form-checkout",
        cardNumber: {
          id: "form-checkout__cardNumber",
          placeholder: "Numero de tarjeta",
        },
        expirationDate: {
          id: "form-checkout__expirationDate",
          placeholder: "MM/YY",
        },
        securityCode: {
          id: "form-checkout__securityCode",
          placeholder: "Código de seguridad",
        },
        cardholderName: {
          id: "form-checkout__cardholderName",
          placeholder: "Titular de la tarjeta",
        },
        issuer: {
          id: "form-checkout__issuer",
          placeholder: "Banco emisor",
        },
        installments: {
          id: "form-checkout__installments",
          placeholder: "Cuotas",
        },        
        cardholderEmail: {
          id: "form-checkout__cardholderEmail",
          placeholder: "E-mail",
        },
        identificationType: {
            id: "form-checkout__identificationType",
        },
        identificationNumber: {
            id: "form-checkout__identificationNumber",
        }
      },
      callbacks: {
        onFormMounted: error => {
          if (error) return console.warn("Form Mounted handling error: ", error);
          console.log("Form mounted");
        },
        onSubmit: async (event) => {
          event.preventDefault();

          const {
            paymentMethodId: payment_method_id,
            issuerId: issuer_id,
            cardholderEmail: email,
            amount,
            token,
            installments,
            identificationNumber,
            identificationType,
          } = cardForm.getCardFormData();

          try {
            const response = await fetch("/process_payment", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
              },
              body: JSON.stringify({
                id_pedido: "{{ $id_pedido }}",
                token,
                issuer_id,
                payment_method_id,
                transaction_amount: parseFloat(amount),
                installments: Number(installments),
                description: "Descripción del producto",
                payer: {
                  email,
                  identification: {
                    type: identificationType,
                    number: identificationNumber,
                  },
                },
              }),
            });
            
            const result = await response.json();
            
            if (result.success) {
              // Redirigir a página de éxito o mostrar mensaje
              alert('¡Pago exitoso! ID: ' + result.payment_id);
              window.location.href = result.redirect_url;
            } else {
              // Mostrar error al usuario
              alert('Error en el pago: ' + (result.message || 'Intenta nuevamente'));
              console.error('Payment error:', result);
            }
          } catch (error) {
            console.error('Error al procesar el pago:', error);
            alert('Error de conexión. Intenta nuevamente.');
          }
        },
        onFetching: (resource) => {
          console.log("Fetching resource: ", resource);

          // Animate progress bar
          const progressBar = document.querySelector(".progress-bar");
          progressBar.removeAttribute("value");

          return () => {
            progressBar.setAttribute("value", "0");
          };
        }
      },
    });

    setTimeout(() => {
        console.log("Campo tipo identificación:", document.getElementById("form-checkout__identificationType"));
        console.log("Campo número identificación:", document.getElementById("form-checkout__identificationNumber"));
        
        // Forzar visibilidad
        const idType = document.getElementById("form-checkout__identificationType");
        const idNumber = document.getElementById("form-checkout__identificationNumber");
        
        if (idType) idType.style.display = "block";
        if (idNumber) idNumber.style.display = "block";
    }, 1000);
</script>
@endsection