<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Escolar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* Animación flotante */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-12px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .float-fast {
            animation: float 3s ease-in-out infinite;
        }

        .float-normal {
            animation: float 4s ease-in-out infinite;
        }

        .float-slow {
            animation: float 6s ease-in-out infinite;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <header class="bg-white shadow-md fixed w-full top-0 left-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
            <h1 class="text-2xl font-bold text-sky-600">Gestión Escolar</h1>
            <nav class="space-x-6 hidden md:flex">
                <a href="#features" class="hover:text-sky-600">Características</a>
                <a href="#about" class="hover:text-sky-600">Nosotros</a>
                <a href="#contact" class="hover:text-sky-600">Contacto</a>
            </nav>
            <a href="{{ route('login') }}" class="bg-sky-600 text-white px-4 py-2 rounded-lg shadow hover:bg-sky-700">
                Iniciar Sesión
            </a>
        </div>
    </header>

    <!-- Hero -->
    <section class="bg-gradient-to-r from-sky-500 to-blue-600 text-white min-h-screen flex items-center">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-10">
            <div class="flex flex-col justify-center">
                <h2 class="text-5xl font-bold leading-tight mb-6">La nueva forma de gestionar tu institución educativa
                </h2>
                <p class="text-lg mb-6">Con <span class="font-semibold">Gestión Escolar</span> administra alumnos,
                    docentes, materiales y más desde una sola plataforma fácil y segura.</p>
                <div class="flex space-x-4">
                    <a href="#features"
                        class="bg-white text-sky-600 px-6 py-3 rounded-lg font-semibold shadow hover:bg-gray-100">
                        Ver más
                    </a>
                    <!--
          <a href="{{ route('register') }}" class="bg-yellow-400 text-gray-900 px-6 py-3 rounded-lg font-semibold shadow hover:bg-yellow-500">
            Registrarse
          </a>
            -->
                </div>
            </div>
            <div class="flex justify-center items-center">
                <img src="https://img.freepik.com/vector-gratis/gestion-escolar-plana_23-2149271827.jpg"
                    alt="Gestión Escolar" class="rounded-xl shadow-lg" data-aos="zoom-in">
            </div>
        </div>
    </section>

    <!-- Features -->
    <section id="features" class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-3xl font-bold text-center text-sky-600 mb-12">Características principales</h3>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="bg-white rounded-xl shadow p-6 text-center float-fast" data-aos="fade-up"
                    data-aos-delay="100">
                    <div class="text-sky-600 text-4xl mb-4">📚</div>
                    <h4 class="font-bold text-lg mb-2">Gestión Académica</h4>
                    <p>Organiza cursos, calificaciones y asistencia de manera rápida y sencilla.</p>
                </div>
                <div class="bg-white rounded-xl shadow p-6 text-center float-normal" data-aos="fade-up"
                    data-aos-delay="200">
                    <div class="text-sky-600 text-4xl mb-4">👩‍🏫</div>
                    <h4 class="font-bold text-lg mb-2">Control de Docentes</h4>
                    <p>Administra información y asignaciones de los docentes de tu institución.</p>
                </div>
                <div class="bg-white rounded-xl shadow p-6 text-center float-slow" data-aos="fade-up"
                    data-aos-delay="300">
                    <div class="text-sky-600 text-4xl mb-4">🖥️</div>
                    <h4 class="font-bold text-lg mb-2">Tecnología Segura</h4>
                    <p>Un sistema moderno, rápido y accesible desde cualquier dispositivo.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About -->
    <section id="about" class="py-20">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <div>
                <img src="https://img.freepik.com/vector-premium/profesor-explicando-estudiantes-aula-ilustracion-dibujos-animados-planos_118813-12365.jpg"
                    alt="Nosotros" class="rounded-xl shadow-lg float-normal" data-aos="fade-right">
            </div>
            <div data-aos="fade-left">
                <h3 class="text-3xl font-bold text-sky-600 mb-4">Sobre Nosotros</h3>
                <p class="text-lg mb-6">Somos un equipo dedicado a modernizar la gestión escolar con soluciones
                    tecnológicas que simplifican la administración de tu institución.</p>
                <ul class="space-y-2">
                    <li>✅ Sistema 100% en línea</li>
                    <li>✅ Soporte a docentes y estudiantes</li>
                    <li>✅ Reportes claros y automáticos</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold text-sky-600 mb-6">Contáctanos</h3>
            <p class="mb-6">¿Quieres más información? Escríbenos y nos pondremos en contacto.</p>
            <a href="mailto:soporte@gestion_escolar.test"
                class="bg-sky-600 text-white px-8 py-3 rounded-lg shadow hover:bg-sky-700">
                Enviar correo
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-sky-600 text-white py-6 mt-10">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <p>© 2025 Gestión Escolar - Todos los derechos reservados</p>
            <div class="space-x-4">
                <a href="#" class="hover:text-yellow-300">Facebook</a>
                <a href="#" class="hover:text-yellow-300">Twitter</a>
                <a href="#" class="hover:text-yellow-300">Instagram</a>
            </div>
        </div>
    </footer>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
</body>

</html>
