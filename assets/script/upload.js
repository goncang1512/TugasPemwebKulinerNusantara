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
        labelImg.style.backgroundColor = "transparent";
        logoGambar.classList.add("logo-image");
      };

      reader.readAsDataURL(file);
    } else {
      imagePreview.src = "";
      imagePreview.style.display = "none";
      labelImg.style.border = "1px dashed black";
      logoImg.style.opacity = "0.4";
      labelImg.style.backgroundColor = "white";
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

const buttonText = document.querySelector(".button-text");
const buttonLoading = document.querySelector(".loader");

const uploadResep = async (data) => {
  buttonText.style.display = "none";
  buttonLoading.style.display = "block";
  try {
    const response = await fetch("index.php", {
      method: "POST",
      body: data,
    });

    const res = await response.json();

    if (!response.ok) {
      throw new Error(res.message);
    }

    window.location.href = `/TugasPemwebKulinerNusantara/pages/profile`;
    buttonText.style.display = "block";
    buttonLoading.style.display = "none";
  } catch (error) {
    errMsg.innerText = error.message;
    buttonText.style.display = "block";
    buttonLoading.style.display = "none";
  }
};

const formSubmit = document.getElementById("upload-form");

formSubmit.addEventListener("submit", async (e) => {
  e.preventDefault();

  const form = e.target;
  const formData = new FormData(form);
  formData.append("upload", "unggah");

  await uploadResep(formData);
});
