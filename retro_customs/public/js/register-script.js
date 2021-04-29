//Form Validation Registration
//console.log('hello');

const registerForm = document.querySelector('.register-form');
const registerSpanMsg = document.querySelector('.register-form span');

registerForm.addEventListener('submit', function(e){
  e.preventDefault();
  const formName = document.querySelector('#formName').value;
  const formEmail = document.querySelector('#formEmail').value;
  const formPassword = document.querySelector('#formPassword').value;
  const formConfirmPassword = document.querySelector('#formConfirmPassword').value;
  const token = registerForm.querySelector('input[name="_token"]').value;
  if(formName.trim() == "" || formEmail.trim() == "" 
  || formPassword.trim() == "" || formConfirmPassword.trim() == "")
  {
    registerSpanMsg.style.display = "block";
    registerSpanMsg.textContent = "Please Fill all the fields!";
  }
  else if(formPassword.trim() !== formConfirmPassword.trim())
  {
    registerSpanMsg.style.display = "block";
    registerSpanMsg.textContent = "Password Did not Match!";
    registerForm.formPassword.value = "";
    registerForm.formConfirmPassword.value = "";
  }
  else
  {
    registerSpanMsg.style.display = "none";
    //console.log(formName.trim());

    fetch(this.action, {
      headers:{
        "Content-Type": "application/json",
      },
      method: 'POST',
      body: JSON.stringify({_token: token, name: formName, email: formEmail, password: formPassword})
    }).then(res =>res.text())
      .then(res => {
        if(res == "Email Already Exist!")
        {
          // console.log(res);
          registerSpanMsg.style.display = "block";
          registerSpanMsg.textContent = res;
          registerForm.reset(); 
        }
        else{
          registerSpanMsg.style.display = "block";
          registerSpanMsg.style.color = "green";
          registerSpanMsg.textContent = res;
          registerForm.reset();
        }
      });
  }
});