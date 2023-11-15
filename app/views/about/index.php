<!-- Open the modal using ID.showModal() method -->
<button class="btn" onclick="my_modal_1.showModal()">open modal</button>
<dialog id="my_modal_1" class="modal">
    <form method="dialog" class="modal-box">
        <h3 class="font-bold text-lg">Hello!</h3>
        <p class="py-4">Press ESC key or click the button below to close</p>
        <div class="modal-action">
            <!-- if there is a button in form, it will close the modal -->
            <button class="btn">Close</button>
        </div>
    </form>
</dialog>

<input type="range" min="0" max="100" value="40" class="range" />




<!-- Modal for Editing Citation and DOI -->
<div id="editModal" class="modal hidden fixed inset-0 bg-gray-500 bg-opacity-75 z-50 justify-center items-center">
    <div class="modal-container bg-white w-96 p-4 rounded shadow-lg">
        <div class="flex justify-end">
            <button id="closeModal" class="text-gray-600 hover:text-gray-800">&times;</button>
        </div>
        <h1 class="text-lg font-bold mb-4">Edit Citation and DOI</h1>
        <form id="editForm">
            <label for="citation">Citation:</label>
            <input type="text" id="citation" name="citation" class="w-full mb-2 p-2 border rounded">

            <label for="doi">DOI:</label>
            <input type="text" id="doi" name="doi" class="w-full mb-2 p-2 border rounded">

            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Save Changes</button>
        </form>
    </div>
</div>