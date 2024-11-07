$("document").ready(function () {
  $(document).on("click", "#button-simpan", function () {
    getSaves();
  });
});

function getSaves() {
  $.ajax({
    url: "index.php?q=getsave",
    type: "GET",
    success: function (res) {
      $("#my-save").html(res);
    },
  });
}

const buttonResep = document.getElementById("button-resep");
const buttonSimpan = document.getElementById("button-simpan");
const containerResep = document.querySelector("#my-resep");
const containerSimpan = document.querySelector("#my-save");

buttonResep.style.backgroundColor = "#228a48";

buttonResep.addEventListener("click", () => {
  containerResep.classList.add("container-makanan");
  containerResep.classList.remove("container-none");

  containerSimpan.classList.add("container-none");
  containerSimpan.classList.remove("container-makanan");

  buttonResep.style.backgroundColor = "#228a48";
  buttonSimpan.style.backgroundColor = "#22c55e";
});

buttonSimpan.addEventListener("click", () => {
  containerResep.classList.remove("container-makanan");
  containerResep.classList.add("container-none");

  containerSimpan.classList.remove("container-none");
  containerSimpan.classList.add("container-makanan");

  buttonResep.style.backgroundColor = "#22c55e";
  buttonSimpan.style.backgroundColor = "#228a48";
});
