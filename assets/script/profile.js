const buttonResep = document.getElementById("button-resep");
const buttonSimpan = document.getElementById("button-simpan");
const containerResep = document.querySelector(".container-resep");
const containerSimpan = document.querySelector(".container-simpan");

buttonResep.addEventListener("click", () => {
  containerResep.style.display = "flex";
  containerSimpan.style.display = "none";
});

buttonSimpan.addEventListener("click", () => {
  containerResep.style.display = "none";
  containerSimpan.style.display = "flex";
});
