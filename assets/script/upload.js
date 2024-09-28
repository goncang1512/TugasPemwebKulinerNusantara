const imagePreview = document.querySelector(".image-preview");
const logoImg = document.querySelector(".logo-foto");
const labelImg = document.querySelector(".upload-food");
const logoGambar = document.getElementById("logo-gambar");

document
  .getElementById("upload-food")
  .addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();

      reader.onload = function (e) {
        imagePreview.src = e.target.result;
        imagePreview.style.display = "block";
        logoImg.style.opacity = "0";
        labelImg.style.border = "none";
        logoGambar.classList.add("logo-image");
      };

      reader.readAsDataURL(file);
    } else {
      imagePreview.src = "";
      imagePreview.style.display = "none";
      labelImg.style.border = "1px dashed black";
      logoImg.style.opacity = "0.4";
      logoGambar.classList.remove("logo-image");
    }
  });

const errMsg = document.querySelector("#error-message");

if (errMsg.innerText) {
  setTimeout(() => {
    errMsg.style.display = "none";
    errMsg.innerHTML = "";
  }, 3000);
}
