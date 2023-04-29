<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Nav</title>
  </head>
  <body>

<?php
    // require_once('./api/settings/Dbconection.php');
    // require_once('./api/models/UserModel.php');
    // require_once('./api/controller/UserController.php');
    // require_once('./api/models/GeneroModel.php');
    // require_once('./api/controller/GeneroController.php');
    // require_once('./api/models/ProgramaModel.php');
    // require_once('./api/controller/ProgramaController.php');
?> 

    <nav class="bg-indigo-500">
        <div class="container py-2 mx-auto px-10 flex flex-wrap items-center justify-between">
            
            <!-- BEGIN logo -->
            <div  class="flex items-center">
                <img src="./public/imgs/logou2.png" class="h-14" alt="img-logo">
                <h2 class="text-white">Universidad de Córdoba</h2>
            </div>
            <!-- END logo -->


            <!-- ENG Botón responsive -->
            <button id="bntResponsive" class="p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-white" data-collapse-toggle="mobile-menu" type="button"  aria-controls="mobile-menu" aria-expanded="false">
                <svg id="iconOpen" class="text-white w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                <svg id="iconClose" class="text-white hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <!-- END Botón responsive -->


            <!-- BEGIN items adicionales -->
            <div class="hidden md:block md:w-auto w-full " id="mobile-menu">
                <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-white md:p-0 dark:text-white" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">About</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Services</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Pricing</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-white hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Contact</a>
                    </li>
                </ul>
              </div>
            <!-- END items adicionales -->
            
            
        </div>
    </nav>

    <nav class="md:bg-gray-800 bg-gray-500 p-1">
        <div class="container mx-auto px-10 w-full">
            <ul class="flex flex-col justify-center md:flex-row mt-1 text-xs md:text-sm">
                <li>
                    <a href="#" class="transition hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 
                                      block py-2
                                    text-gray-100 border-b border-gray-400 
                                      hover:rounded-md text-sm 
                                      hover:bg-gray-700 
                                      hover:text-gray-200
                                      md:border-0 md:mx-2 md:px-3" aria-current="page">Inicio</a>
                </li>
                <li>
                    <a href="#" class="transition hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 
                                        block py-2
                                    text-gray-100 border-b border-gray-400 hover:rounded-md text-sm hover:bg-gray-700 hover:text-gray-200
                                      md:border-0 md:mx-2 md:px-3" aria-current="page">Mis Cursos</a>
                </li>
                <li>
                    <a href="#" class="transition hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300  
                                        block py-2
                                    text-gray-100 border-b border-gray-400 hover:rounded-md text-sm hover:bg-gray-700 hover:text-gray-200
                                      md:border-0 md:mx-2 md:px-3" aria-current="page">Calificaciones</a>
                </li>
                <li>
                    <a href="#" class="transition hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 
                                        block py-2
                                    text-gray-100 border-b border-gray-400 hover:rounded-md text-sm hover:bg-gray-700 hover:text-gray-200
                                      md:border-0 md:mx-2 md:px-3" aria-current="page">Insignias</a>
                </li>
            </ul>
        </div>
    </nav>
    </body>
</html>