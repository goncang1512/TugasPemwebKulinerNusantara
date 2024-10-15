AOS.init();

const BASE_URL = "/TugasPemwebKulinerNusantara/";

const handleRouter = (link) => {
  window.location.href = link;
};

const save = async (link, resep_id) => {
  const buttonSave = document.getElementById(`heart-save-${resep_id}`);
  const cardContent = document.querySelector(`.card-content-${resep_id}`);

  try {
    const res = await fetch(`${link}`, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    });

    const response = await res.json();
    if (response.result.req === "save") {
      buttonSave.classList.add("bi-heart-fill", "text-danger");
      buttonSave.classList.remove("bi-heart");
    } else if (response.result.req === "delete") {
      buttonSave.classList.add("bi-heart");
      buttonSave.classList.remove("bi-heart-fill", "text-danger");
      if (cardContent) {
        cardContent.classList.add("d-none");
      }
    }
  } catch (error) {
    console.error(error);
  }
};
