const dropdownBtn = document.querySelectorAll(".dropdown-btn");
const dropdown = document.querySelectorAll(".dropdown");
const hamburgerBtn = document.getElementById("hamburger");
const navMenu = document.querySelector(".menu");
const links = document.querySelectorAll(".dropdown a");

function setAriaExpandedFalse() {
  dropdownBtn.forEach((btn) => btn.setAttribute("aria-expanded", "false"));
}

function closeDropdownMenu() {
  dropdown.forEach((drop) => {
    drop.classList.remove("active");
    drop.addEventListener("click", (e) => e.stopPropagation());
  });
}

function toggleHamburger() {
  navMenu.classList.toggle("show");
}

dropdownBtn.forEach((btn) => {
  btn.addEventListener("click", function (e) {
    const dropdownIndex = e.currentTarget.dataset.dropdown;
    const dropdownElement = document.getElementById(dropdownIndex);

    dropdownElement.classList.toggle("active");
    dropdown.forEach((drop) => {
      if (drop.id !== btn.dataset.dropdown) {
        drop.classList.remove("active");
      }
    });
    e.stopPropagation();
    btn.setAttribute(
      "aria-expanded",
      btn.getAttribute("aria-expanded") === "false" ? "true" : "false"
    );
  });
});

// Close dropdown menu when the dropdown links are clicked
links.forEach((link) =>
  link.addEventListener("click", () => {
    closeDropdownMenu();
    setAriaExpandedFalse();
    toggleHamburger();
  })
);

// Close dropdown menu when you click on the document body
document.documentElement.addEventListener("click", () => {
  closeDropdownMenu();
  setAriaExpandedFalse();
});

// Close dropdown when the escape key is pressed
document.addEventListener("keydown", (e) => {
  if (e.key === "Escape") {
    closeDropdownMenu();
    setAriaExpandedFalse();
  }
});

// Toggle hamburger menu
hamburgerBtn.addEventListener("click", toggleHamburger);

// Auto-scroll untuk tautan Kontak
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();

    document.querySelector(this.getAttribute("href")).scrollIntoView({
      behavior: "smooth",
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  // Ambil semua tombol "Edit Biodata"
  var editButtons = document.querySelectorAll("[data-ml-modal-toggle]");

  // Tambahkan event listener untuk setiap tombol "Edit Biodata"
  editButtons.forEach(function (button) {
    button.addEventListener("click", function (event) {
      event.preventDefault(); // Hentikan perilaku bawaannya (mengarahkan ke halaman lain)

      // Ambil ID modal dari atribut data-ml-modal-toggle
      var modalId = button.getAttribute("data-ml-modal-toggle");

      // Tampilkan modal dengan memanggil fungsi openModal()
      var modal = document.querySelector('[data-ml-modal="' + modalId + '"]');
      if (modal) {
        modal.openModal();
      }
    });
  });
});

// Get the modal
var modal1 = document.getElementById("myModal1");

// Get the button that opens the modal
var btn1 = document.getElementById("myBtn1");

// Get the <span> element that closes the modal
var span1 = document
  .getElementById("myModal1")
  .getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn1.onclick = function () {
  modal1.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
span1.onclick = function () {
  modal1.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
};

function showDeleteModal(id, foto) {
  document.getElementById("confirmDelete3").setAttribute("data-id", id);
  document.getElementById("confirmDelete3").setAttribute("data-foto", foto);
  document.getElementById("deleteModal3").style.display = "block";
}

function closeModal() {
  document.getElementById("deleteModal3").style.display = "none";
}

function confirmDelete() {
  var id = document.getElementById('confirmDelete3').getAttribute('data-id');
  var foto = document.getElementById('confirmDelete3').getAttribute('data-foto');
  if (id && foto) {
      window.location.href = 'hapus_siswa.php?id=' + id  + '&foto=' + foto;
  } else {
      alert('Parameter tidak lengkap');
  }
}
