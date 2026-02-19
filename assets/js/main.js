function validateRegistrationForm(){
    let fullName = $("input[name='fullName']").val().trim();
    let phone = $("input[name='phone']").val().trim();
    let email = $("input[name='email']").val().trim();
    let password = $("input[name='password']").val().trim();
    let confirmPassword = $("input[name='confirmPassword']").val().trim();

    $("#message").html("");

    if(fullName==="" || phone==="" || email === "" || password === "" || confirmPassword === ""){
        showError('all fields are required')
        return false;
    }

    let phoneRegex = /^[0-9]{10}$/;

    if(!phoneRegex.test(phone)){
        showError("phone number must be exectly 10 digits");
        return false;
    }

    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!emailRegex.test(email)){
        showError("invalid email format")
        return false;
    }

    //password minimum length

    if(password.length <6){
        showError("password must be atleast 6 character long")
        return false;
    }

    //password match check

    if(password !== confirmPassword){
        showError("password do not match")
        return false;

    }
    return true;



}

function showError(message){
    $("#message").html(
        '<div class="alert alert-danger bg-outline-danger">'+message+'</div>'
    )
}


// SIDEBAR SHRINK/EXPAND + MOBILE FLYOUT (100% original logic, untouched)
  (function() {
    "use strict";
    const sidebar = document.getElementById('sidebar');
    const backdrop = document.getElementById('sidebarBackdrop');
    const toggleDesktop = document.getElementById('sidebarCollapse');
    const toggleMobile = document.getElementById('sidebarCollapseMobile');
    const closeMobileBtn = document.getElementById('closeSidebarMobile');

    if (toggleDesktop) {
      toggleDesktop.addEventListener('click', function(e) {
        e.preventDefault();
        if (window.innerWidth > 768) sidebar.classList.toggle('desktop-hidden');
      });
    }
    function openMobileSidebar() {
      if (window.innerWidth <= 768) {
        sidebar.classList.add('mobile-visible');
        backdrop.classList.add('active');
        sidebar.classList.remove('desktop-hidden');
      }
    }
    function closeMobileSidebar() {
      sidebar.classList.remove('mobile-visible');
      backdrop.classList.remove('active');
    }
    if (toggleMobile) {
      toggleMobile.addEventListener('click', function(e) {
        e.preventDefault();
        openMobileSidebar();
      });
    }
    if (closeMobileBtn) {
      closeMobileBtn.addEventListener('click', function(e) {
        e.preventDefault();
        closeMobileSidebar();
      });
    }
    if (backdrop) {
      backdrop.addEventListener('click', function() {
        closeMobileSidebar();
      });
    }
    window.addEventListener('resize', function() {
      if (window.innerWidth > 768) {
        sidebar.classList.remove('mobile-visible');
        backdrop.classList.remove('active');
      } else {
        sidebar.classList.remove('desktop-hidden');
        sidebar.classList.remove('mobile-visible');
        backdrop.classList.remove('active');
      }
    });
    if (window.innerWidth <= 768) {
      sidebar.classList.remove('desktop-hidden');
      sidebar.classList.remove('mobile-visible');
    }
  })();