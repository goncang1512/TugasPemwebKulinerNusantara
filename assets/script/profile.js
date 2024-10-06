$("document").ready(function () {
  $(document).on("click", "#button-simpan", function () {
    getSaves();
  });
});

function getSaves() {
  $.ajax({
    url: "save.component.php",
    type: "GET",
    success: function (res) {
      $(".container-simpan").html(res);
    },
  });
}

const buttonResep = document.getElementById("button-resep");
const buttonSimpan = document.getElementById("button-simpan");
const containerResep = document.querySelector(".container-resep");
const containerSimpan = document.querySelector(".container-simpan");

buttonResep.style.backgroundColor = "#228a48";

buttonResep.addEventListener("click", () => {
  containerResep.style.display = "flex";
  containerSimpan.style.display = "none";
  buttonResep.style.backgroundColor = "#228a48";
  buttonSimpan.style.backgroundColor = "#22c55e";
});

buttonSimpan.addEventListener("click", () => {
  containerResep.style.display = "none";
  containerSimpan.style.display = "flex";
  buttonResep.style.backgroundColor = "#22c55e";
  buttonSimpan.style.backgroundColor = "#228a48";
});
