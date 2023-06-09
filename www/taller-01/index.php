<html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de personas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    require_once("./views/head/head.php");
    ?>
    <div class="container mx-auto px-10">

        <h1 class="text-4xl text-center py-4">Registro de personas</h1>
        <form>
            <div class="mb-6">
                <label for="identificacion" class="block mb-2 text-sm font-medium text-gray-900 ">Identificación</label>
                <input type="text" id="identificacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
            </div>

            <div class="mb-6">
                <label for="nombres" class="block mb-2 text-sm font-medium text-gray-900 ">Nombre Completo</label>
                <input type="text" id="nombres" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
            </div>

            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
            </div>

            <div class="mb-6">
                <label for="fecha_nac" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha de Nacimiento</label>
                <input type="date" id="fecha_nac" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
            </div>

            <div class="mb-6">
                <label for="programa" class="block mb-2 text-sm font-medium text-gray-900 ">Programa</label>
                <select name="genero" id="programa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Seleccione un valor</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="genero" class="block mb-2 text-sm font-medium text-gray-900 ">Genero</label>
                <select name="genero" id="genero" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="">Seleccione un valor</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="observaciones" class="block mb-2 text-sm font-medium text-gray-900 ">Observaciones</label>
                <textarea id="observaciones" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            <button id="btn-enviar" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar</button>
        </form>

        <section id="sectionModal" class="hidden">
            <!-- Main modal -->
            <div id="defaultModal" class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full flex justify-center">
                <div class="relative w-full max-w-6xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t">
                            <h3 class="text-xl font-semibold text-gray-900">
                                Actualizar persona - Identificación: <span id="identificacion_show" class="font-semibold"></span>
                            </h3>   
                            
                            <button type="button" class="btnCloseMod text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <form>
                                <div class="mb-4">
                                    <label for="nombres_up" class="block mb-2 text-sm font-medium text-gray-900 ">Nombre Completo</label>
                                    <input type="text" id="nombres_up" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
                                </div>

                                <div class="mb-4">
                                    <label for="email_up" class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                                    <input type="email" id="email_up" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
                                </div>

                                <div class="mb-4">
                                    <label for="fecha_nac_up" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha de Nacimiento</label>
                                    <input type="date" id="fecha_nac_up" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
                                </div>

                                <div class="mb-4">
                                    <label for="programa_up" class="block mb-2 text-sm font-medium text-gray-900 ">Programa</label>
                                    <select name="genero" id="programa_up" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="">Seleccione un valor</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="genero_up" class="block mb-2 text-sm font-medium text-gray-900 ">Genero</label>
                                    <select name="genero" id="genero_up" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="">Seleccione un valor</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="observaciones" class="block mb-2 text-sm font-medium text-gray-900 ">Observaciones</label>
                                    <textarea id="observaciones_up" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                                </div>
                            </form>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-2 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button id="btnUpdated" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Actualizar</button>
                            <button id="btnClose" type="button" class="btnCloseMod text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-5 my-12">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                identificacion
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nombre completo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fecha Nacimiento
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Programa
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Genero
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Observaciones
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tBodyContentPersons">

                    </tbody>
                </table>
            </div>

        </section>

    </div>
    <script src="./public/js/scripts.js"></script>
</body>

</html>