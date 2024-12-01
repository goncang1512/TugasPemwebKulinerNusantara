const imagePreview = document.querySelector(".image-preview");
const logoImg = document.querySelector(".logo-foto");
const labelImg = document.querySelector(".upload-food");
const logoGambar = document.getElementById("logo-gambar");

const srcImage = imagePreview.getAttribute("src");

if (srcImage) {
  imagePreview.style.display = "block";
  logoImg.style.opacity = "0";
  labelImg.style.border = "none";
  labelImg.style.backgroundColor = "transparent";
  logoGambar.classList.add("logo-image");
} else {
  imagePreview.src = "";
  imagePreview.style.display = "none";
  labelImg.style.border = "1px dashed black";
  logoImg.style.opacity = "0.4";
  labelImg.style.backgroundColor = "white";
  logoGambar.classList.remove("logo-image");
}

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

    window.location.href = `${BASE_URL}pages/profile`;
    buttonText.style.display = "block";
    buttonLoading.style.display = "none";
  } catch (error) {
    errMsg.innerText = error.message;
    buttonText.style.display = "block";
    buttonLoading.style.display = "none";
    console.log(error);
  }
};

const updateResep = async (data, resep_id) => {
  buttonText.style.display = "none";
  buttonLoading.style.display = "block";
  try {
    const response = await fetch(`index.php?resep_id=${resep_id}`, {
      method: "POST",
      body: data,
    });

    if (!response.ok) {
      const errorText = await response.text();
      throw new Error(errorText);
    }

    const res = await response.json();

    if (!response.ok) {
      throw new Error(res.message);
    }

    window.location.href = `${BASE_URL}pages/profile`;
    buttonText.style.display = "block";
    buttonLoading.style.display = "none";
  } catch (error) {
    console.error(error);
    errMsg.innerText = error.message;
    buttonText.style.display = "block";
    buttonLoading.style.display = "none";
  }
};

const formSubmit = document.getElementById("upload-form");
const updateForm = document.getElementById("update-form");

if (formSubmit) {
  formSubmit.addEventListener("submit", async (e) => {
    e.preventDefault();
    const formData = new FormData(formSubmit);
    formData.append("upload", "unggah");
    await uploadResep(formData);
  });
}

if (updateForm) {
  updateForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const formData = new FormData(updateForm);
    formData.append("upload", "update");
    await updateResep(formData, formData.get("resep_id"));
  });
}
