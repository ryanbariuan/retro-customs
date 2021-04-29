const extraPrice = document.querySelector('.build-order-container .build-order-header p #extra-price');
const formExtraPrice = document.querySelector('.build-order-form-container .build-order-form .totalPrice');

const buildOrderForm = document.querySelector('.build-order-form-container .build-order-form');

const buttonCustom = buildOrderForm.querySelector('.buttons');
const lensCustom = buildOrderForm.querySelector('.lenses');
const screenCustom = buildOrderForm.querySelector('.screens');
const shellCustom = buildOrderForm.querySelector('.shells');
const batteryCustom = buildOrderForm.querySelector('.batteries');

const extraButtonContainer = document.querySelector('.extra-button-container');
const extraLensContainer = document.querySelector('.extra-lens-container');
const extraScreenContainer = document.querySelector('.extra-screen-container');
const extraShellContainer = document.querySelector('.extra-shell-container');
const extraBatteryContainer = document.querySelector('.extra-battery-container');


function computeTotal()
{
  const buttonPrice =  extraButtonContainer.querySelector('.part-price span');
  const lensPrice = extraLensContainer.querySelector('.part-price span');
  const screenPrice = extraScreenContainer.querySelector('.part-price span');
  const shellPrice = extraShellContainer.querySelector('.part-price span');
  const batteryPrice = extraBatteryContainer.querySelector('.part-price span');

  let total = 0;

  total = (total + parseFloat(buttonPrice.textContent) + parseFloat(lensPrice.textContent)
    + parseFloat(screenPrice.textContent) + parseFloat(shellPrice.textContent) 
    + parseFloat(batteryPrice.textContent));

  return total;
  
}

buttonCustom.addEventListener('change', function(){
  const buttonID = buttonCustom.value;
  const buttonSelect = document.querySelector(`.buttonID-${buttonID}`);
  let buttonPrice = buttonSelect.getAttribute(`data-buttonPrice`);
  let buttonImg = buttonSelect.getAttribute(`data-buttonImg`);
  let buttonDesc = buttonSelect.getAttribute(`data-buttonDesc`);

  const img =  extraButtonContainer.querySelector('.img-wrapper img');
  const desc = extraButtonContainer.querySelector('.part-name');
  const price = extraButtonContainer.querySelector('.part-price span');

  if(buttonID != 0)
  {
    extraButtonContainer.style.display = "flex";
    img.setAttribute('src', buttonImg);
    desc.textContent = buttonDesc;
    price.textContent = buttonPrice;

    extraPrice.textContent = parseFloat(computeTotal());
    formExtraPrice.value = parseFloat(computeTotal());
  }
  else
  {
    price.textContent = 0;
    extraPrice.textContent = parseFloat(computeTotal());
    formExtraPrice.value = parseFloat(computeTotal());
    extraButtonContainer.style.display = "none";
  }
});

lensCustom.addEventListener('change', function(){
  const lensID = lensCustom.value;
  const lensSelect = document.querySelector(`.lensID-${lensID}`);
  let lensPrice = lensSelect.getAttribute(`data-lensPrice`);
  let lensImg = lensSelect.getAttribute(`data-lensImg`);
  let lensDesc = lensSelect.getAttribute(`data-lensDesc`);

  const img =  extraLensContainer.querySelector('.img-wrapper img');
  const desc = extraLensContainer.querySelector('.part-name');
  const price = extraLensContainer.querySelector('.part-price span');

  if(lensID != 0)
  {
    extraLensContainer.style.display = "flex";
    img.setAttribute('src', lensImg);
    desc.textContent = lensDesc;
    price.textContent = lensPrice;

    extraPrice.textContent = parseFloat(computeTotal());
    formExtraPrice.value = parseFloat(computeTotal());
  }
  else
  {
    price.textContent = 0;
    extraPrice.textContent = parseFloat(computeTotal());
    formExtraPrice.value = parseFloat(computeTotal());
    extraLensContainer.style.display = "none";
  }
});

screenCustom.addEventListener('change', function(){
  const screenID = screenCustom.value;
  const screenSelect = document.querySelector(`.screenID-${screenID}`);
  let screenPrice = screenSelect.getAttribute(`data-screenPrice`);
  let screenImg = screenSelect.getAttribute(`data-screenImg`);
  let screenDesc = screenSelect.getAttribute(`data-screenDesc`);

  const img =  extraScreenContainer.querySelector('.img-wrapper img');
  const desc = extraScreenContainer.querySelector('.part-name');
  const price = extraScreenContainer.querySelector('.part-price span');

  if(screenID != 0)
  {
    extraScreenContainer.style.display = "flex";
    img.setAttribute('src', screenImg);
    desc.textContent = screenDesc;
    price.textContent = screenPrice;

    extraPrice.textContent = parseFloat(computeTotal());
    formExtraPrice.value = parseFloat(computeTotal());
  }
  else
  {
    price.textContent = 0;
    extraPrice.textContent = parseFloat(computeTotal());
    formExtraPrice.value = parseFloat(computeTotal());
    extraScreenContainer.style.display = "none";
  }
});

shellCustom.addEventListener('change', function(){
  const shellID = shellCustom.value;
  const shellSelect = document.querySelector(`.shellID-${shellID}`);
  let shellPrice = shellSelect.getAttribute(`data-shellPrice`);
  let shellImg = shellSelect.getAttribute(`data-shellImg`);
  let shellDesc = shellSelect.getAttribute(`data-shellDesc`);

  const img =  extraShellContainer.querySelector('.img-wrapper img');
  const desc = extraShellContainer.querySelector('.part-name');
  const price = extraShellContainer.querySelector('.part-price span');

  if(shellID != 0)
  {
    extraShellContainer.style.display = "flex";
    img.setAttribute('src', shellImg);
    desc.textContent = shellDesc;
    price.textContent = shellPrice;

    extraPrice.textContent = parseFloat(computeTotal());
    formExtraPrice.value = parseFloat(computeTotal());
  }
  else
  {
    price.textContent = 0;
    extraPrice.textContent = parseFloat(computeTotal());
    formExtraPrice.value = parseFloat(computeTotal());
    extraShellContainer.style.display = "none";
  }
});

batteryCustom.addEventListener('change', function(){
  const batteryID = batteryCustom.value;
  const batterySelect = document.querySelector(`.batteryID-${batteryID}`);
  let batteryPrice = batterySelect.getAttribute(`data-batteryPrice`);
  let batteryImg = batterySelect.getAttribute(`data-batteryImg`);
  let batteryDesc = batterySelect.getAttribute(`data-batteryDesc`);

  const img =  extraBatteryContainer.querySelector('.img-wrapper img');
  const desc = extraBatteryContainer.querySelector('.part-name');
  const price = extraBatteryContainer.querySelector('.part-price span');

  if(batteryID != 0)
  {
    extraBatteryContainer.style.display = "flex";
    img.setAttribute('src', batteryImg);
    desc.textContent = batteryDesc;
    price.textContent = batteryPrice;

    extraPrice.textContent = parseFloat(computeTotal());
    formExtraPrice.value = parseFloat(computeTotal());
  }
  else
  {
    price.textContent = 0;
    extraPrice.textContent = parseFloat(computeTotal());
    formExtraPrice.value = parseFloat(computeTotal());
    extraBatteryContainer.style.display = "none";
  }
});

