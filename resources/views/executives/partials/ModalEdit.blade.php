
<div id="myModal2" class="modal">
    <div class="modal-content">
        <div id="edit-modal" class="w-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="p-4 bg-gray-200">
                    <div class="p-4 bg-white rounded-md">
                        <div class="my-3">
                            <p class="text-xl font-semibold text-start"> Editar Ejecutivos </p>
                        </div>

                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <form class="my-3 mx-2" id="form-edit">
                                <input type="text" id="idModalEdit" name="idModalEdit" hidden value="123">
                                <div class="flex justify-between">
                                    <div class="py-2 w-3/6 mr-2">
                                        <label for="name2" class="block mb-2 text-sm font-medium">Nombre
                                            <span class="text-red-500"> * </span> </label>
                                        <input type="text" id="name2" name="name" required
                                            class="w-full py-1 border gray-400 border-2 rounded-md px-2 upper-case">
                                    </div>
                                    <div class="py-2 w-3/6 ml-2">
                                        <label for="lastname2" class="block mb-2 text-sm font-medium">Apellidos <span
                                                class="text-red-500"> * </span> </label>
                                        <input type="text" id="lastname2" name="lastname" required
                                            class="w-full py-1 border gray-400 border-2 rounded-md px-2 upper-case">
                                    </div>
                                </div>
                                <div class="flex justify-between">
                                    <div class="py-2 w-3/6 mr-3">
                                        <label class="block mb-2 text-sm font-medium" for="photo"> Foto
                                            <span class="text-red-500"> * </span>
                                        </label>
                                        <label for="photo" class="block mb-2 text-sm font-medium border">
                                            <input type="file" id="photo2" name="photo"
                                                class="w-full py-1 border gray-400 border-2 rounded-md px-2 upper-case hidden"
                                                accept="image/*" onchange="previewImage(event)" </label>

                                            <div class="mt-4">
                                                <img id="photoPreview2" class="hidden w-32 h-32 object-cover rounded-md"
                                                    src="" />
                                            </div>
                                    </div>
                                    <div class="w-3/6">
                                        <div class="py-2 ml-2">
                                            <label for="phone2" class="block mb-2 text-sm font-medium"> Celular
                                                <span class="text-red-500"> * </span> </label>
                                            <input type="text" id="phone2" name="phone" required
                                                class="w-full py-2 border gray-400 border-2 rounded-md px-2 upper-case">
                                        </div>
                                        <div class="py-2 ml-2">
                                            <label for="address2" class="block mb-2 text-sm font-medium"> Dirección
                                            </label>
                                            <input type="text" id="address2" name="address"
                                                class="w-full py-1 border gray-400 border-2 rounded-md px-2 upper-case">
                                        </div>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <label for="position2" class="block mb-2 text-sm font-medium"> Cargo
                                        <span class="text-red-500"> * </span> </label>
                                    <input type="text" id="position2" name="position" required
                                        class="w-full py-1 border gray-400 border-2 rounded-md px-2 upper-case">
                                </div>
                                <div class="py-2">
                                    <label for="state2" class="block mb-2 text-sm font-medium"> Estado </label>
                                    <select name="state" id="state2"
                                        class="w-full py-1 border gray-400 border-2 rounded-md px-2 upper-case">
                                        <option value="1"> Activo</option>
                                        <option value="0"> Inactivo</option>
                                    </select>
                                </div>
                                <div class="flex my-1">
                                    <button type="submit"
                                        class="bg-blue-500 w-1/3 py-1 rounded-md text-white font-semibold">Actualizar</button>
                                    <button id="closeButtonBtnEdit" type="button"
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
