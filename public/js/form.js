window.addEventListener('alert-success', event => {
  Swal.fire({
    title: "Selamat!",
    text: "Data Berhasil di Simpan!",
    icon: "success"
  });
});

document.addEventListener('DOMContentLoaded', (event) => {
  const isActiveCompany = document.getElementById('isActiveCompany'); 
  const endMonthCompany = document.getElementById('endMonthCompany');
  const endYearCompany = document.getElementById('endYearCompany');
  
  isActiveCompany.addEventListener('change', (event) => { 
      if (isActiveCompany.checked) { 
          endMonthCompany.setAttribute('disabled', 'disabled');
          endYearCompany.setAttribute('disabled', 'disabled');
      } else {
          endMonthCompany.removeAttribute('disabled');
          endYearCompany.removeAttribute('disabled');
      }
  });
});


document.addEventListener('DOMContentLoaded', (event) => {
  const isActiveOrganization = document.getElementById('isActiveOrganization'); 
  const endMonthOrganization = document.getElementById('endMonthOrganization');
  const endYearOrganization = document.getElementById('endYearOrganization');
  
  isActiveOrganization.addEventListener('change', (event) => { 
      if (isActiveOrganization.checked) { 
          endMonthOrganization.setAttribute('disabled', 'disabled');
          endYearOrganization.setAttribute('disabled', 'disabled');
      } else {
          endMonthOrganization.removeAttribute('disabled');
          endYearOrganization.removeAttribute('disabled');
      }
  });
});



