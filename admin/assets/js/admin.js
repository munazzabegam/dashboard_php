  document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById("adminSidebar");
    const toggleBtn = document.getElementById("toggleSidebar");
    const mainContent = document.querySelector('.admin-main');

    toggleBtn.addEventListener("click", function () {
      sidebar.classList.toggle("hidden");
      mainContent.classList.toggle("full-width");
    });
  });

