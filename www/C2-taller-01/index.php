<html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Universidades</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="./public/js/scriptTailwind.js"></script>
    <script src="./public/js/scriptAxios.js"></script>
    <script src="./public/js/scriptSweetalert2.js"></script>
</head>

<body>
    <?php
    require_once("./views/head/head.php");
    ?>
    <div class="container mx-auto px-10">

        <h1 class="text-4xl text-center py-4">Registro de Universidades</h1>
        <form>
            <div class="mb-6">
                <label for="universidad" class="block mb-2 text-sm font-medium text-gray-900 ">Nombre Universidad</label>
                <input type="text" id="universidad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
            </div>

            <div class="mb-6">
                <label for="cantidad_salones" class="block mb-2 text-sm font-medium text-gray-900 ">Cantidad Salones</label>
                <input type="number" id="cantidad_salones" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
            </div>

            <button id="btn-enviar" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrar</button>
        </form>

        <section id="sectionModal" class="hidden">
            <!-- Main modal -->
            <div id="defaultModal" class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full flex justify-center">
                <div class="relative w-full max-w-6xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative rounded-lg shadow bg-white">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t">
                            <h3 class="text-xl font-semibold text-gray-900">
                                Actualizar Universidad ID: <span id="universidad_show" class="font-semibold"></span>
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
                                    <label for="universidad_up" class="block mb-2 text-sm font-medium text-gray-900 ">Nombre Universidad</label>
                                    <input type="text" id="universidad_up" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
                                </div>

                                <div class="mb-4">
                                    <label for="cantidad_salones_up" class="block mb-2 text-sm font-medium text-gray-900 ">Cantidad Salones</label>
                                    <input type="email" id="cantidad_salones_up" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
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

        <section id="sectionModalSalones" class="hidden">
            <!-- Main modal -->
            <div id="defaultModalS" class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full flex justify-center">
                <div class="relative w-full max-w-6xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative rounded-lg shadow bg-white">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 border-b rounded-t">
                            <h3 class="text-xl font-semibold text-gray-900 mx-5">
                                Universidad ID: <span id="universidad_show_id" class="font-semibold"></span>
                            </h3> <br />

                            <button type="button" class="btnCloseModSalon text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <div class="flex justify-center">
                                <h3 class="text-lg font-semibold text-gray-900">
                                    Agregar Salones a: <span id="universidad_show_u" class="text-md"></span>
                                </h3>
                                <h5 class="text-lg font-semibold text-gray-900 mx-4">
                                    Cantidad maxima salones: <span id="universidad_show_cantidad" class="text-md"></span>
                                </h5>
                            </div>
                            <form>
                                <div class="mb-6">
                                    <label for="salones_add" class="block mb-2 text-sm font-medium text-gray-900 ">Salones</label>
                                    <select name="salones_add" id="salone_add" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="">Seleccione un valor</option>
                                    </select>
                                </div>

                                <div class="mb-6">
                                    <label for="tipo_salon_add" class="block mb-2 text-sm font-medium text-gray-900 ">Tipos Salones</label>
                                    <select name="tipo_salon_add" id="tipo_salon_add" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="">Seleccione un valor</option>
                                    </select>
                                </div>

                            </form>
                            <div class="flex items-center p-2 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button id="btnCreateRoom" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Agregar</button>
                                <button id="btnCloseSalon" type="button" class="btnCloseModSalon text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancelar</button>
                            </div>

                        </div>
                        <!-- Modal footer -->
                        <div class="flex justify-center p-2 space-x-2 border-t border-gray-200 rounded-b">
                            <!--SECTION TABLE SALONES -->
                            <section class="mt-5 my-12">
                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <table class="w-full text-sm text-left text-gray-500 ">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    #
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    UNIVERSIDAD
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    SALON
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    TIPO DE SALON
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    ACCIONES
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="tBodyContentUniversidadSalones">

                                        </tbody>
                                    </table>
                                </div>

                            </section>
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
                                UNIVERSIDADES
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NUMERO DE SALONES
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ACCIONES
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tBodyContentUniversidad">

                    </tbody>
                </table>
            </div>

        </section>

    </div>
    <script src="./public/js/scripts.js"></script>
</body>

</html>