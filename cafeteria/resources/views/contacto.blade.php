@extends('layout.app')

@section('app', 'Contacto')

@section('contenido')
<div class="p-6 max-w-7xl mx-auto">
    
    <!-- Título de la página -->
    <h1 class="text-4xl text-center font-bold text-amber-900 mb-4">CONTÁCTANOS</h1>
    <hr class="border-2 border-amber-900 mb-8 w-24 mx-auto">

    <!-- Mapa y ubicación -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
        <!-- Mapa (iframe de Google Maps) -->
        <div class="rounded-lg overflow-hidden shadow-lg h-96">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119133.4366511255!2d-103.37652745!3d20.67666645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b18e2b0e4e81%3A0xbb060c0b3785cbe2!2sGuadalajara%2C%20Jal.!5e0!3m2!1ses!2smx!4v1710456789012!5m2!1ses!2smx" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"
                class="w-full h-full">
            </iframe>
        </div>

        <!-- Información de contacto -->
        <div class="bg-amber-50 rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold text-amber-900 mb-6">Información de Contacto</h2>
            
            <div class="space-y-6">
                <!-- Dirección -->
                <div class="flex items-start">
                    <div class="bg-amber-700 p-3 rounded-full mr-4">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">Dirección</h3>
                        <p class="text-gray-600">Av. Vallarta #1234</p>
                        <p class="text-gray-600">Col. Americana, Guadalajara, Jalisco</p>
                        <p class="text-gray-600">C.P. 44100</p>
                    </div>
                </div>

                <!-- Teléfono -->
                <div class="flex items-start">
                    <div class="bg-amber-700 p-3 rounded-full mr-4">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">Teléfonos</h3>
                        <p class="text-gray-600">📞 +52 33 1234 5678</p>
                        <p class="text-gray-600">📞 +52 33 8765 4321</p>
                        <p class="text-gray-600">📠 Fax: +52 33 1234 5679</p>
                    </div>
                </div>

                <!-- Correo electrónico -->
                <div class="flex items-start">
                    <div class="bg-amber-700 p-3 rounded-full mr-4">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">Correos Electrónicos</h3>
                        <p class="text-gray-600">📧 info@peregrinocafe.com</p>
                        <p class="text-gray-600">📧 reservaciones@peregrinocafe.com</p>
                        <p class="text-gray-600">📧 contacto@peregrinocafe.com</p>
                    </div>
                </div>

                <!-- Horarios -->
                <div class="flex items-start">
                    <div class="bg-amber-700 p-3 rounded-full mr-4">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">Horarios</h3>
                        <p class="text-gray-600">Lunes a Viernes: 8:00 AM - 10:00 PM</p>
                        <p class="text-gray-600">Sábados: 9:00 AM - 11:00 PM</p>
                        <p class="text-gray-600">Domingos: 9:00 AM - 8:00 PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario de contacto -->
    <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
        <h2 class="text-2xl font-bold text-amber-900 mb-6 text-center">Envíanos un mensaje</h2>
        
        <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf
            
            <!-- Nombre -->
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre completo *</label>
                <input type="text" id="nombre" name="nombre" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
            </div>

            <!-- Correo electrónico -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico *</label>
                <input type="email" id="email" name="email" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
            </div>

            <!-- Teléfono -->
            <div>
                <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">Teléfono de contacto</label>
                <input type="tel" id="telefono" name="telefono" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
            </div>

            <!-- Asunto -->
            <div>
                <label for="asunto" class="block text-sm font-medium text-gray-700 mb-1">Asunto *</label>
                <input type="text" id="asunto" name="asunto" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
            </div>

            <!-- Mensaje (ocupa las dos columnas) -->
            <div class="md:col-span-2">
                <label for="mensaje" class="block text-sm font-medium text-gray-700 mb-1">Mensaje *</label>
                <textarea id="mensaje" name="mensaje" rows="5" required 
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500"></textarea>
            </div>

            <!-- Checkbox de consentimiento -->
            <div class="md:col-span-2">
                <div class="flex items-center">
                    <input type="checkbox" id="consentimiento" name="consentimiento" required 
                           class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-gray-300 rounded">
                    <label for="consentimiento" class="ml-2 block text-sm text-gray-700">
                        Acepto que mis datos sean tratados para responder a mi solicitud
                    </label>
                </div>
            </div>

            <!-- Botón de enviar -->
            <div class="md:col-span-2 text-center">
                <button type="submit" 
                        class="bg-amber-700 text-white py-3 px-8 rounded-lg hover:bg-amber-800 transition duration-200 font-semibold text-lg">
                    Enviar mensaje
                </button>
            </div>
        </form>
    </div>

    <!-- Redes Sociales -->
    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold text-amber-900 mb-4">Síguenos en redes sociales</h2>
        <div class="flex justify-center space-x-6">
            <!-- Facebook -->
            <a href="#" class="bg-blue-600 text-white p-3 rounded-full hover:bg-blue-700 transition duration-200">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                </svg>
            </a>
            <!-- Instagram -->
            <a href="#" class="bg-pink-600 text-white p-3 rounded-full hover:bg-pink-700 transition duration-200">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153.509.5.902 1.105 1.153 1.772.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 01-1.153 1.772c-.5.509-1.105.902-1.772 1.153-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 01-1.772-1.153 4.904 4.904 0 01-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 011.153-1.772A4.897 4.897 0 015.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2zm0 5a5 5 0 100 10 5 5 0 000-10zm6.5-.25a1.25 1.25 0 10-2.5 0 1.25 1.25 0 002.5 0zM12 9a3 3 0 110 6 3 3 0 010-6z"/>
                </svg>
            </a>
            <!-- Twitter/X -->
            <a href="#" class="bg-black text-white p-3 rounded-full hover:bg-gray-800 transition duration-200">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                </svg>
            </a>
            <!-- WhatsApp -->
            <a href="#" class="bg-green-600 text-white p-3 rounded-full hover:bg-green-700 transition duration-200">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.087-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824z"/>
                </svg>
            </a>
        </div>
    </div>

    <!-- Preguntas frecuentes -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-amber-900 mb-6 text-center">Preguntas Frecuentes</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="font-bold text-amber-800 mb-2">¿Hacen entregas a domicilio?</h3>
                <p class="text-gray-600">Sí, entregamos a domicilio en un radio de 5 km. El costo de envío es de $30 pesos.</p>
            </div>
            
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="font-bold text-amber-800 mb-2">¿Aceptan reservaciones?</h3>
                <p class="text-gray-600">Sí, aceptamos reservaciones para grupos de hasta 10 personas con 24 horas de anticipación.</p>
            </div>
            
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="font-bold text-amber-800 mb-2">¿Tienen estacionamiento?</h3>
                <p class="text-gray-600">Sí, contamos con estacionamiento gratuito para nuestros clientes.</p>
            </div>
            
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="font-bold text-amber-800 mb-2">¿Aceptan mascotas?</h3>
                <p class="text-gray-600">Sí, tenemos un área pet-friendly en nuestra terraza.</p>
            </div>
        </div>
    </div>
</div>
@endsection