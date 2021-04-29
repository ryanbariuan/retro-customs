const closeModalBtn = document.querySelector('.btn-close');
const closeEditModalBtn = document.querySelector('.btn-close-edit');
const closeDeleteModalBtn = document.querySelector('.btn-close-delete');
const closeRestoreModalBtn = document.querySelector('.btn-close-restore');

const addConsoleModalBtn = document.querySelector('.btn-add-console');

const addConsoleModal = document.querySelector('.add-console-modal-container');
const editConsoleModal = document.querySelector('.edit-console-modal-container');
const deleteConsoleModal = document.querySelector('.delete-console-modal-container');
const restoreConsoleModal = document.querySelector('.restore-console-modal-container');



// FOR ADD CONSOLE MODAL FORM
closeModalBtn.addEventListener('click', function () {
  addConsoleModal.style.display = "none";
});

addConsoleModalBtn.addEventListener('click', function() {
  addConsoleModal.style.display = "block";
});


// FOR EDIT CONSOLE MODAL FORM
const editConsoleModalBtn = document.querySelectorAll('.btn-edit-console');
const editConsoleForm = document.querySelector('.edit-console-form');
editConsoleModalBtn.forEach(function (editBtn){
  editBtn.addEventListener('click', function(){
    const consoleID = editBtn.getAttribute('data-consoleID');
    // alert(consoleID); // successful
    editConsoleModal.style.display = "block";
    editConsoleForm.action = "/consoles/" + consoleID;

    const toEditConsoleName = document.querySelector(`.consoleName-${consoleID}`);
    const toEditConsolePrice = document.querySelector(`.consolePrice-${consoleID}`);
    const toEditConsoleDesc = document.querySelector(`.consoleDesc-${consoleID}`);
    const toEditConsoleImage = document.querySelector(`.consoleImg-${consoleID}`);
    let consoleImg = toEditConsoleImage.getAttribute('src');

    const consoleName = editConsoleForm.querySelector('input[name="console_name"]');
    const consolePrice = editConsoleForm.querySelector('input[name="console_price"]');
    const consoleDesc = editConsoleForm.querySelector('textarea[name="console_desc"]');
    const consoleImage = editConsoleForm.querySelector('input[name="console_image"]');

    consoleName.value = toEditConsoleName.textContent;
    consolePrice.value = toEditConsolePrice.textContent;
    consoleDesc.value = toEditConsoleDesc.textContent;
    consoleImage.value = consoleImg;

  });
});

closeEditModalBtn.addEventListener('click', function () {
  editConsoleModal.style.display = "none";
});

// FOR DELETE MODAL FORM
const deleteConsoleModalBtn = document.querySelectorAll('.btn-delete-console');
const deleteConsoleForm = document.querySelector('.delete-console-form');
deleteConsoleModalBtn.forEach(function (delBtn){
  delBtn.addEventListener('click', function(){
    const consoleID = delBtn.getAttribute('data-consoleID');
    deleteConsoleModal.style.display = "block";
    deleteConsoleForm.action = "/consoles/" + consoleID;

  });
});

closeDeleteModalBtn.addEventListener('click', function () {
  deleteConsoleModal.style.display = "none";
});

// FOR RESTORE MODAL FORM
const restoreConsoleModalBtn = document.querySelectorAll('.btn-restore-console');
const restoreConsoleForm = document.querySelector('.restore-console-form');
restoreConsoleModalBtn.forEach(function (restoreBtn){
  restoreBtn.addEventListener('click', function(){
    const consoleID = restoreBtn.getAttribute('data-consoleID');
    restoreConsoleModal.style.display = "block";
    restoreConsoleForm.action = `/consoles/${consoleID}/restore`;
  });
})
  

closeRestoreModalBtn.addEventListener('click', function () {
  restoreConsoleModal.style.display = "none";
});

// -----------------------------------
// FOR PARTS ITEM SECTION
// -----------------------------------

const addPartModalBtn = document.querySelector('.btn-add-parts');
const editPartModalBtn = document.querySelectorAll('.btn-edit-part');
const deletePartModalBtn = document.querySelectorAll('.btn-delete-part');
const restorePartModalBtn = document.querySelectorAll('.btn-restore-part');

const addPartModalContainer = document.querySelector('.add-part-modal-container');
const editPartModalContainer = document.querySelector('.edit-part-modal-container');
const deletePartModalContainer = document.querySelector('.delete-part-modal-container');
const restorePartModalContainer = document.querySelector('.restore-part-modal-container');

const closeAddPartModalBtn = document.querySelector('.add-part-modal-container .btn-close');
const closeEditPartModalBtn = document.querySelector('.edit-part-modal-container .btn-close');
const closeDeletePartModalBtn = document.querySelector('.delete-part-modal-container .btn-close');
const closeRestorePartModalBtn = document.querySelector('.restore-part-modal-container .btn-close');

const addPartForm = document.querySelector('.add-part-modal-container .parts-form');
const editPartForm = document.querySelector('.edit-part-modal-container .parts-form');
const deletePartForm = document.querySelector('.delete-part-modal-container .parts-form');
const restorePartForm = document.querySelector('.restore-part-modal-container .parts-form');

const addSubmitPartModalBtn = document.querySelector('.add-part-modal-container .parts-form button');
const editSubmitPartModalBtn = document.querySelector('.edit-part-modal-container .parts-form button');
const deleteSubmitPartModalBtn = document.querySelector('.delete-part-modal-container .parts-form button');
const restoreSubmitPartModalBtn = document.querySelector('.restore-part-modal-container .parts-form button');

//ADD PARTS
addPartModalBtn.addEventListener('click', function() {
  addPartModalContainer.style.display = "block";
  const consoleOption = addPartForm.querySelector('select[name="console"]');
  let chosenOption = consoleOption.value;
  consoleOption.addEventListener('change', function(){
    chosenOption = consoleOption.value;
  });
  addPartForm.action = `/consoles/${chosenOption}/parts`;
  addPartForm.method = `POST`;
 
});

closeAddPartModalBtn.addEventListener('click', function () {
  addPartModalContainer.style.display = "none";
});

//EDIT PARTS
editPartModalBtn.forEach(function(editPartBtn){
  editPartBtn.addEventListener('click', function(){
    editPartModalContainer.style.display = "block";
    const partID = editPartBtn.getAttribute(`data-partID`);

    editPartForm.action = `/parts/${partID}`;

    const toEditPartName = document.querySelector(`.partName-${partID}`);
    const toEditConsole = document.querySelector(`span.consoleName-${partID}`);
    const toEditCategory = document.querySelector(`span.partCategory-${partID}`);
    const toEditPartPrice = document.querySelector(`.partPrice-${partID}`);
    const toEditPartDesc = document.querySelector(`.partDesc-${partID}`);
    const toEditPartImage = document.querySelector(`.partImg-${partID}`);
    let partImg = toEditPartImage.getAttribute('src');

    const partName = editPartForm.querySelector(`input[name="part_name"]`);
    const partConsole = editPartForm.querySelector(`select[name="console"]`);
    const partCategory = editPartForm.querySelector(`select[name="category"]`);
    const partPrice = editPartForm.querySelector(`input[name="part_price"]`);
    const partDesc = editPartForm.querySelector(`textarea[name="part_desc"]`);
    const partImage = editPartForm.querySelector(`input[name="part_image"]`);

    partName.value = toEditPartName.textContent;
    partConsole.value =  toEditConsole.textContent;
    partCategory.value = toEditCategory.textContent;
    partPrice.value =  toEditPartPrice.textContent;
    partDesc.value = toEditPartDesc.textContent;
    partImage.value = partImg;

  });
});

closeEditPartModalBtn.addEventListener('click', function () {
  editPartModalContainer.style.display = "none";
});

// DELETE PARTS
deletePartModalBtn.forEach(function(delPartBtn){
  delPartBtn.addEventListener('click', function(){
    const partID = delPartBtn.getAttribute('data-partID');
    deletePartModalContainer.style.display = "block";
    deletePartForm.action = `/parts/${partID}`;

  });
});

closeDeletePartModalBtn.addEventListener('click', function () {
  deletePartModalContainer.style.display = "none";
});

// RESTORE PARTS
restorePartModalBtn.forEach(function(restorePartBtn){
  restorePartBtn.addEventListener('click', function(){
    const partID = restorePartBtn.getAttribute('data-partID');
    restorePartModalContainer.style.display = "block";
    restorePartForm.action = `/parts/${partID}/restore`;
  });
});

closeRestorePartModalBtn.addEventListener('click', function () {
  restorePartModalContainer.style.display = "none";
});