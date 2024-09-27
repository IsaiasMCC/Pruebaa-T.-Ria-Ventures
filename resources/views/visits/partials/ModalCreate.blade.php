<div id="myModal" class="modal">
    <div class="modal-content">
        <div id="create-modal" class="w-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="p-4  bg-gray-200">
                    <div class="p-4 bg-white rounded-md">
                        <div class="my-3">
                            <p class="text-xl font-semibold text-start"> Agregar Visita </p>
                        </div>

                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
                            <form class="my-3 mx-2" method="post" id="form-create">
                                <div class="flex justify-between">
                                    <div class="py-2 w-3/6 mr-2">
                                        <label for="name" class="block mb-2 text-sm font-medium">Nombre <span
                                                class="text-red-500"> * </span> </label>
                                        <input type="text" id="name" name="name" required
                                            class="w-full py-1 border gray-400 border-2 rounded-md px-2 upper-case">
                                    </div>
                                    <div class="py-2 w-3/6 ml-2">
                                        <label for="lastname" class="block mb-2 text-sm font-medium ">Apellidos
                                            <span class="text-red-500"> * </span></label>
                                        <input type="text" id="lastname" name="lastname" required
                                            class="w-full py-1 border gray-400 border-2 rounded-md px-2 upper-case">
                                    </div>
                                    <div class="py-2 w-3/6 ml-2">
                                        <label for="ci" class="block mb-2 text-sm font-medium ">CI <span
                                                class="text-red-500"> * </span></label>
                                        <input type="text" id="ci" name="ci" required
                                            class="w-full py-1 border gray-400 border-2 rounded-md px-2 upper-case">
                                    </div>
                                </div>
                                <div class="flex justify-between">
                                    <div class="w-3/6">
                                        <div class="py-2 mr-2">
                                            <label for="date" class="block mb-2 text-sm font-medium ">Fecha
                                                <span class="text-red-500"> * </span> </label>
                                            <input type="date" id="date" name="date" required
                                                class="w-full py-2 border gray-400 border-2 rounded-md px-2 upper-case">
                                        </div>
                                        <div class="py-2 mr-2">
                                            <label for="time" class="block mb-2 text-sm font-medium ">Hora <span
                                                    class="text-red-500"> * </span>
                                            </label>
                                            <input type="time" id="time" name="time" required
                                                class="w-full py-1 border gray-400 border-2 rounded-md px-2 upper-case">
                                        </div>
                                    </div>
                                    <div class="w-3/6">
                                        <div class="py-2 ml-2">
                                            <label for="phone" class="block mb-2 text-sm font-medium ">Celular
                                                <span class="text-red-500"> * </span> </label>
                                            <input type="text" id="phone" name="phone" required
                                                class="w-full py-2 border gray-400 border-2 rounded-md px-2 upper-case">
                                        </div>
                                        <div class="py-2 ml-2">
                                            <label for="email" class="block mb-2 text-sm font-medium ">Correo
                                            </label>
                                            <input type="email" id="email" name="email"
                                                class="w-full py-1 border gray-400 border-2 rounded-md px-2 upper-case">
                                        </div>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <label for="state" class="block mb-2 text-sm font-medium "> Estado </label>
                                    <select name="state" id="state" required
                                        class="w-full py-1 border gray-400 border-2 rounded-md px-2 upper-case">
                                        <option value="1" selected> Activo</option>
                                        <option value="0"> Inactivo</option>
                                    </select>
                                </div>
                                <div class="flex my-1">
                                    <button type="submit"
                                        class="bg-blue-500 w-1/3 py-1 rounded-md text-white font-semibold">
                                        Agregar
                                    </button>
                                    <button id="closeModalBtn" type="button"
                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
