(() => {
  'use strict'
  
  const forms = document.querySelectorAll('.needs-validation')

  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()


function purchaseCalc(){

  let p_qty = document.forms['frm']['quantity'].value;
  let p_price = document.forms['frm']['price'].value;
  let p_gst = document.forms['frm']['gst'].value;

  let total = parseFloat(p_price)/parseFloat(p_qty);
  let gst = parseFloat(p_price)*parseFloat(p_gst)/100;
  let net = parseFloat(p_price)+gst;

  document.forms['frm']['total'].value=total;
  document.forms['frm']['net'].value=net;

  return;
}

function saleCalc(){
 
  let p_qty = document.forms['frm']['sqty'].value;
  let p_price = document.forms['frm']['sprice'].value;
  let p_gst = document.forms['frm']['sgst'].value;

  let total = parseFloat(p_price) * parseFloat(p_qty);
  let gst = parseFloat(p_price)*parseFloat(p_gst)/100;
  let net = total+gst;

  document.forms['frm']['stotal'].value=total;
  document.forms['frm']['snet'].value=net;

  return;
}




