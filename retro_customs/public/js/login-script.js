const loginForm = document.querySelector('.login-form');
const loginSpanMsg = document.querySelector('.login-form span');

loginForm.addEventListener('submit', function(e){
  const formEmail = document.querySelector('#formEmail').value;
  const formPassword = document.querySelector('#formPassword').value;
  const token = loginForm.querySelector('input[name="_token"]').value;


  if(formEmail.trim() == "" || formPassword.trim() == ""){
    e.preventDefault();
    loginSpanMsg.style.display = "block";
    loginSpanMsg.textContent = "Please Fill all the fields!";
    loginForm.formEmail.value = "";
    loginForm.formPassword.value = "";
  }
  // else
  // {

  //   e.preventDefault();
  //   fetch(this.action, {
  //     headers:{
  //       "Content-Type": "application/json",
  //     },
  //     method: 'POST',
  //     body: JSON.stringify({_token: token, email: formEmail, password: formPassword})
  //   }).then(res =>res.text())
  //   .then(res => {

  //     if(res == "Incorrect Email or Password")
  //     {
  //       loginSpanMsg.style.display = "block";
  //       loginSpanMsg.textContent = res;
  //     }
  //     else
  //     {
  //       loginForm.bind('submit').submit();
  //     }
  //   });

  // }
})
