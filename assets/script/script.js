AOS.init();

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

const pathname = window.location.pathname;

if (pathname === BASE_URL) {
  window.addEventListener("scroll", function () {
    const navbar = document.querySelector(".navbar");
    const navItem = document.querySelector(".nav-item-beranda");

    if (window.scrollY > 10) {
      navbar.classList.add("bg-body-tertiary", "shadow-sm");
      navItem.classList.add("bg-nav-item", "in-link");
      navItem.classList.remove("bg-nav-item-mobile", "in-link-mobile");
    } else {
      navItem.style.color = "black";
      navbar.classList.remove("bg-body-tertiary", "shadow-sm");
      navItem.classList.remove("bg-nav-item", "in-link");
      navItem.classList.add("bg-nav-item-mobile", "in-link-mobile");
    }
  });
}

const imageRotate = document.querySelector(".image-oracle");
const gambarRotate = document.querySelectorAll(".gambar-oracle");
const buttonRotate = (
  rotate,
  gambar_rotate,
  position,
  position_mobile,
  responsive
) => {
  const screen = window.innerWidth;

  const currentPosition =
    screen <= 768 ? position_mobile : screen <= 1024 ? responsive : position;
  imageRotate.style.rotate = `${rotate}`;
  imageRotate.style.top = `${currentPosition}`;
  gambarRotate.forEach((image) => {
    image.style.rotate = `${gambar_rotate}`;
  });
};
