const showAddAddressFormBtn = document.querySelector('.show-add-address-btn-container button');
const addAddressForm = document.querySelector('.address-form-container');
const hideAddressFormLink = document.querySelector('#hide-form-address-container .cancel-address-form-link');
const newAddressForm = document.querySelector('.new-address-form');
const usernameContainer = document.querySelector('.welcome-msg-container p');

/*
  const allAddressContainer = document.querySelectorAll('.user-addresses-container .address-container');
  allAddressContainer.forEach(function(addressContainer){
    const addressID = addressContainer.getAttribute('data-addressID');
    const perContainer = document.querySelector(`.address-container-${addressID}`);
    const containerDefault = perContainer.querySelector('h3');
    if(containerDefault)
    {
      perContainer.style.order = 0;
    }
    else
    {
      perContainer.style.order = 1;
    }
  });
*/



//ADD ADDRESS FORM
showAddAddressFormBtn.addEventListener('click', function(){ 
  if(addAddressForm.style.display == "block")
  {
    addAddressForm.style.display = "none";
  }
  else
  {
    addAddressForm.style.display = "block";
  }
});

hideAddressFormLink.addEventListener('click', function(){
  addAddressForm.style.display = "none";
});

// EDIT ADDRESS FORM
const showEditAddressForm = document.querySelectorAll('.user-addresses-container .manage-address-container .editLink');

showEditAddressForm.forEach(function(showEdit){
  const addressID = showEdit.getAttribute('data-addressID');
  const userID = usernameContainer.getAttribute('data-userID');
  const editAddressFormContainer = document.querySelector(`.editAddressContainer-${addressID}`);
  const editAddressForm = editAddressFormContainer.querySelector('.edit-address-form');
  const hideEditAddressFormLink = editAddressFormContainer.querySelector(`.cancel-edit-${addressID}`);

  showEdit.addEventListener('click', function(){
    if(editAddressFormContainer.style.display == "block")
    {
      editAddressFormContainer.style.display = "none";
    }
    else
    {
      editAddressFormContainer.style.display = "block";
      editAddressForm.action = `/profile/${userID}/addresses/${addressID}`;
      const toEditFirstName = document.querySelector(`.address-container .firstName-${addressID}`);
      const toEditLastName = document.querySelector(`.address-container .lastName-${addressID}`);
      const toEditAddress = document.querySelector(`.address-container .address-${addressID}`);
      const toEditPostal = document.querySelector(`.address-container .postalCode-${addressID}`);
      const toEditProvince = document.querySelector(`.address-container .province-${addressID}`);
      const toEditCity = document.querySelector(`.address-container .city-${addressID}`);
      const toEditCountry = document.querySelector(`.address-container .country-${addressID}`);
      const toEditPhone = document.querySelector(`.address-container .phone-${addressID}`);
      const isDefault = document.querySelector(`.address-container-${addressID} h3`);

      // console.log(isDefault.textContent);

      const firstName = editAddressForm.querySelector('input[name="firstname"]');
      const lastName = editAddressForm.querySelector('input[name="lastname"]');
      const address = editAddressForm.querySelector('input[name="address"]');
      const postalCode = editAddressForm.querySelector('input[name="postal_code"]');
      const province = editAddressForm.querySelector('input[name="province"]');
      const city = editAddressForm.querySelector('input[name="city"]');
      const country = editAddressForm.querySelector('input[name="country"]');
      const phone = editAddressForm.querySelector('input[name="phone"]');
      const isChecked = editAddressForm.querySelector('input[name="isCheckedDefault"]');

      firstName.value = toEditFirstName.textContent;
      lastName.value = toEditLastName.textContent;
      address.value = toEditAddress.textContent;
      postalCode.value = toEditPostal.textContent;
      province.value = toEditProvince.textContent;
      city.value = toEditCity.textContent;
      country.value = toEditCountry.textContent;
      phone.value = toEditPhone.textContent;
      if(isDefault)
      {
        isChecked.checked = true;
        isChecked.disabled = true;
      }
      else
      {
        isChecked.checked = false;
      }

    }
  });
  hideEditAddressFormLink.addEventListener('click', function(){
    editAddressFormContainer.style.display = "none";
  })
});

// DELETE ADDRESS
const showDeleteAddressModal = document.querySelectorAll('.user-addresses-container .manage-address-container .deleteLink');
showDeleteAddressModal.forEach(function(showDel){
  const addressID = showDel.getAttribute('data-addressID');
  const userID = usernameContainer.getAttribute('data-userID');
  const delModal = document.querySelector('.delete-address-modal-container');
  const closeModal = delModal.querySelector('.btn-close');
  const delForm = delModal.querySelector('.address-form');

  showDel.addEventListener('click', function(){
    delModal.style.display = "block";
    delForm.action = `/profile/${userID}/addresses/${addressID}`;
  });

  closeModal.addEventListener('click', function(){
    delModal.style.display = "none";
  })

});
 