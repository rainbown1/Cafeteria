<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffe App @yield('app')</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Iconos <link rel="stylesheet" href="../css/app.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800">
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>

<a href="{{ route('carrito') }}" class="fixed bottom-4 right-4 bg-taupe-500 hover:bg-taupe-700 text-white rounded-full p-3 shadow-lg flex items-center justify-center z-50">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Uploaded to svgrepo.com" width="40px" height="40px" viewBox="0 0 32 32" xml:space="preserve">
                    <style type="text/css">
                        .puchipuchi_een{fill:#ffffff;}
                    </style>
                    <path class="puchipuchi_een" d="M16,28c0,1.105-0.895,2-2,2s-2-0.895-2-2c0-1.105,0.895-2,2-2S16,26.895,16,28z M25,26  c-1.105,0-2,0.895-2,2c0,1.105,0.895,2,2,2s2-0.895,2-2C27,26.895,26.105,26,25,26z M27,21H12.281l0.5,2H27c0.553,0,1,0.448,1,1  s-0.447,1-1,1H12c-0.459,0-0.858-0.312-0.97-0.757L6.219,5H2C1.447,5,1,4.552,1,4s0.447-1,1-1h5c0.459,0,0.858,0.312,0.97,0.757  L8.78,7h0.001H30c0.308,0,0.599,0.142,0.788,0.385s0.257,0.559,0.182,0.858l-3,12C27.858,20.688,27.459,21,27,21z M22,10  c0,0.552,0.448,1,1,1s1-0.448,1-1c0-0.552-0.448-1-1-1S22,9.448,22,10z M18,10c0,0.552,0.448,1,1,1s1-0.448,1-1c0-0.552-0.448-1-1-1  S18,9.448,18,10z M14,10c0,0.552,0.448,1,1,1s1-0.448,1-1c0-0.552-0.448-1-1-1S14,9.448,14,10z M12,10c0-0.552-0.448-1-1-1  s-1,0.448-1,1c0,0.552,0.448,1,1,1S12,10.552,12,10z M14,14c0-0.552-0.448-1-1-1s-1,0.448-1,1c0,0.552,0.448,1,1,1S14,14.552,14,14z   M16,18c0-0.552-0.448-1-1-1s-1,0.448-1,1c0,0.552,0.448,1,1,1S16,18.552,16,18z M18,14c0-0.552-0.448-1-1-1s-1,0.448-1,1  c0,0.552,0.448,1,1,1S18,14.552,18,14z M20,18c0-0.552-0.448-1-1-1s-1,0.448-1,1c0,0.552,0.448,1,1,1S20,18.552,20,18z M22,14  c0-0.552-0.448-1-1-1s-1,0.448-1,1c0,0.552,0.448,1,1,1S22,14.552,22,14z M24,18c0-0.552-0.448-1-1-1s-1,0.448-1,1  c0,0.552,0.448,1,1,1S24,18.552,24,18z M26,14c0-0.552-0.448-1-1-1s-1,0.448-1,1c0,0.552,0.448,1,1,1S26,14.552,26,14z M27,11  c0.552,0,1-0.448,1-1c0-0.552-0.448-1-1-1s-1,0.448-1,1C26,10.552,26.448,11,27,11z"/>
                    </svg>
                <span class="bg-red-500 text-white px-2 rounded-full text-xs">
                {{ count(session('carrito', [])) }}
                </span>
                </a>

<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidenav">
  <div class="overflow-y-auto py-5 px-3 h-full bg-taupe-500">
      <ul class="space-y-2">
           <!-- Icono Inicio -->
            <li>
                <a href="/inicio" class="flex items-center p-2 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 16 16" fill="currentColor">
                        <path d="M1 6V15H6V11C6 9.89543 6.89543 9 8 9C9.10457 9 10 9.89543 10 11V15H15V6L8 0L1 6Z"/>
                    </svg>
                    <span class="ml-3">Inicio</span>
                </a>
            </li>
            <!-- Icono Sobre Nosotros -->
            <li>
                <a href="/nosotros" class="flex items-center p-2 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24" fill="currentColor">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM12 17.75C12.4142 17.75 12.75 17.4142 12.75 17V11C12.75 10.5858 12.4142 10.25 12 10.25C11.5858 10.25 11.25 10.5858 11.25 11V17C11.25 17.4142 11.5858 17.75 12 17.75ZM12 7C12.5523 7 13 7.44772 13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8C11 7.44772 11.4477 7 12 7Z"/>
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Sobre nosotros</span>
                </a>
            </li>
            
          <li>
              <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-authentication" data-collapse-toggle="dropdown-authentication">
                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" width="50px" height="50px" viewBox="0 0 512 512" version="1.1" xml:space="preserve">
                  <g id="coffee-cup-tea-heart-love">
                  <path d="M238.23,232c-3.555,0-6.797-2.383-7.738-5.977c-7.405-28.394,22.411-41.758,2.418-62.078l-28.313-28.758   c-25.432-25.828-9.573-67.618,24.203-70.992c9.75-0.945,19.324,1.594,27.199,7.125c7.879-5.531,17.461-8.07,27.199-7.125   c33.725,3.369,49.662,45.136,24.203,70.992c-3.098,3.156-8.168,3.188-11.313,0.094c-3.148-3.102-3.188-8.164-0.086-11.313   c16.014-16.277,6.085-41.818-14.387-43.852c-7.355-0.703-14.652,1.914-19.918,7.25c-3.008,3.063-8.391,3.063-11.398,0   c-5.262-5.336-12.516-7.953-19.918-7.25c-20.382,2.025-30.48,27.494-14.387,43.852l28.316,28.758   c28.169,28.609-3.408,49.828,1.664,69.25c1.113,4.281-1.445,8.648-5.723,9.766C239.578,231.914,238.898,232,238.23,232z    M272.328,231.742c4.273-1.117,6.832-5.492,5.719-9.766c-1.926-7.359,0.953-14.102,4.285-21.906   c5.188-12.164,12.293-28.813-5.949-47.344c-3.105-3.156-8.172-3.188-11.316-0.094c-3.148,3.102-3.188,8.164-0.09,11.313   c10.723,10.898,7.68,18.023,2.637,29.844c-3.914,9.172-8.355,19.578-5.051,32.234c0.941,3.594,4.184,5.977,7.738,5.977   C270.969,232,271.648,231.914,272.328,231.742z M256.207,320c-43.139,0-88-14.07-88-40c0-25.984,45.336-40,88-40s88,14.016,88,40   C344.207,308.551,292.544,320,256.207,320z M256.207,256c-43.953,0-72,14.211-72,24c0,3.24,3.92,6.939,6.557,8.845   C207.263,278.089,230.727,272,256.207,272c25.481,0,48.948,6.09,65.446,16.846c2.643-1.909,6.554-5.599,6.554-8.846   C328.207,270.211,300.16,256,256.207,256z M256.207,336c32.999,0,69.611-7.794,87.76-24c0.08,0,0.16-0.08,0.24-0.16V312h20   c15.44,0,28,12.56,28,28v40c0,15.44-12.56,28-28,28h-34.32c-6.551,10.078-13.768,17.389-23.147,24h13.467c4.422,0,8,3.578,8,8   s-3.578,8-8,8h-128c-4.422,0-8-3.578-8-8s3.578-8,8-8h13.533c-22.667-15.928-37.533-42.225-37.533-72v-48.16   C189.819,330.127,227.766,336,256.207,336z M364.207,384c2.24,0,4-1.76,4-4v-40c0-2.24-1.76-4-4-4h-20v24c0,8.32-1.12,16.4-3.36,24   H364.207z M283.967,374.56c-7.12-8.96-20-9.44-27.76-1.44c-7.76-8-20.64-7.52-27.76,1.44c-6.32,7.84-4.96,19.36,2.08,26.56   l19.92,20.48c3.2,3.2,8.32,3.2,11.52,0l19.92-20.48C288.927,393.92,290.287,382.4,283.967,374.56z"/>
                  </g>
                  <g id="Layer_1"/>
                  </svg>
                  <span class="flex-1 ml-3 text-left whitespace-nowrap">Menu</span>
                  <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
              <ul id="dropdown-authentication" class="hidden py-2 space-y-2">
                  <li>
                      <a href="/cafe" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Cafe</a>
                  </li>
                  <li>
                      <a href="/bebidas" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Bebidas</a>
                  </li>
                  <li>
                      <a href="/postres" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Postres</a>
                  </li>
                  <li>
                      <a href="/snacks" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Snacks</a>
                  </li>
              </ul>
          </li>
          <li>
              <a href="/contacto" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" version="1.1" id="Capa_1" width="30px" height="30px" viewBox="0 0 45.814 45.814" xml:space="preserve">
                  <g>
                    <g>
                      <path d="M29.319,17.088c-1.853-1.838-4.846-1.835-6.694,0.013c-1.853,1.851-1.853,4.855,0,6.708    c0.091,0.09,4.485,4.465,6.104,6.074c0.326,0.325,0.855,0.325,1.181,0c1.619-1.609,6.015-5.984,6.104-6.074    c1.853-1.853,1.853-4.856,0-6.708C34.165,15.253,31.173,15.25,29.319,17.088z"/>
                      <path d="M38.003,0H12.767C9.379,0,6.631,2.728,6.621,6.112h2.448c2.458,0,4.458,2.012,4.458,4.47s-2,4.471-4.458,4.471H6.62v3.384    h2.448c2.458,0,4.458,2.012,4.458,4.47s-2,4.47-4.458,4.47H6.62v3.436h2.448c2.458,0,4.458,1.986,4.458,4.444    s-2,4.445-4.458,4.445H6.62c0.024,3.384,2.767,6.112,6.146,6.112h25.236c3.396,0,6.146-2.752,6.146-6.146V6.147    C44.149,2.752,41.397,0,38.003,0z M40.108,39.678c0,1.192-0.953,2.146-2.146,2.146H18.54V3.991h19.422    c1.193,0,2.146,0.979,2.146,2.172V39.678L40.108,39.678z"/>
                      <path d="M4.134,13.033h4.935c1.362,0,2.467-1.087,2.467-2.45c0-1.362-1.104-2.45-2.467-2.45H4.134    c-1.362,0-2.467,1.087-2.467,2.45C1.667,11.945,2.772,13.033,4.134,13.033z"/>
                      <path d="M4.134,25.408h4.935c1.362,0,2.467-1.112,2.467-2.475c0-1.362-1.104-2.475-2.467-2.475H4.134    c-1.362,0-2.467,1.113-2.467,2.475C1.667,24.295,2.772,25.408,4.134,25.408z"/>
                      <path d="M11.535,35.258c0-1.363-1.104-2.475-2.467-2.475H4.134c-1.362,0-2.467,1.111-2.467,2.475c0,1.362,1.104,2.475,2.467,2.475    h4.935C10.431,37.732,11.535,36.62,11.535,35.258z"/>
                    </g>
                  </g>
                  </svg>
                  <span class="flex-1 ml-3 whitespace-nowrap">Contacto</span>
                  <span class="inline-flex justify-center items-center w-5 h-5 text-xs font-semibold rounded-full text-primary-800 bg-primary-100 dark:bg-primary-200 dark:text-primary-800">
                      6   
                  </span>
              </a>
          </li>
          <li>
          </li>
      </ul>
  </div>
  <div class="hidden absolute bottom-0 left-0 justify-center p-4 space-x-4 w-full lg:flex bg-taupe-700 dark:bg-taupe-700 z-20 border-r border-gray-200 dark:border-gray-700">
    <a href="/registro" class="inline-flex justify-center p-2 text-gray-300 rounded cursor-pointer dark:text-gray-300 hover:text-white dark:hover:text-white hover:bg-gray-700 dark:hover:bg-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="40px" height="40px" viewBox="0 0 32 32" class="text-white">
            <path d="M16 15.503A5.041 5.041 0 1 0 16 5.42a5.041 5.041 0 0 0 0 10.083zm0 2.215c-6.703 0-11 3.699-11 5.5v3.363h22v-3.363c0-2.178-4.068-5.5-11-5.5z"/>
        </svg>
           @if(session()->has('cliente'))

                <span class="ml-2">
                    Bienvenido, {{ session('cliente')['nombre'] }}
                </span>
                <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="bg-red-600 text-white px-4 py-2 rounded">
                    Cerrar sesión
                </button>
                </form>
            @else

                <span class="ml-2">
                    <a href="/login">Iniciar sesión</a> | 
                    <a href="/registro">Registrarse</a>
                </span>

            @endif
    </a>
    
</div>

</aside>
<main class="sm:ml-64 p-4">
        <div class="mt-14">
            @yield('contenido')
        </div>
        
        <!-- Footer -->
        <div class="mt-12 pt-6 border-t border-gray-200 text-center text-gray-500 text-sm">
            <p>Cafeteria &copy; 2026 - App web para cafeteria</p>
        </div>
  </main>
    <script src="../js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>