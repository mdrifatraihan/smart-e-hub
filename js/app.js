const header = document.querySelector("[data-header]");
const toggle = document.querySelector("[data-menu-toggle]");
const nav = document.querySelector("[data-nav]");
const searchForm = document.querySelector(".search-form");
const searchInput = document.querySelector("[data-search-input]");
const productGrid = document.querySelector("[data-product-grid]");
const emptyState = document.querySelector("[data-empty-state]");
const products = Array.from(document.querySelectorAll(".product-card"));

const updateHeaderShadow = () => {
  header.classList.toggle("is-scrolled", window.scrollY > 8);
};

updateHeaderShadow();
window.addEventListener("scroll", updateHeaderShadow, { passive: true });

toggle.addEventListener("click", () => {
  const isOpen = nav.classList.toggle("is-open");
  toggle.setAttribute("aria-expanded", String(isOpen));
  toggle.setAttribute("aria-label", isOpen ? "Close menu" : "Open menu");
});

document.addEventListener("click", (event) => {
  const clickedInsideMenu = nav.contains(event.target) || toggle.contains(event.target);

  if (!clickedInsideMenu && nav.classList.contains("is-open")) {
    nav.classList.remove("is-open");
    toggle.setAttribute("aria-expanded", "false");
    toggle.setAttribute("aria-label", "Open menu");
  }
});

searchForm.addEventListener("submit", (event) => {
  event.preventDefault();
  searchInput.focus();
});

searchInput.addEventListener("input", () => {
  const query = searchInput.value.trim().toLowerCase();
  let visibleCount = 0;

  products.forEach((card) => {
    const title = card.dataset.title.toLowerCase();
    const isVisible = title.includes(query);
    card.hidden = !isVisible;
    visibleCount += isVisible ? 1 : 0;
  });

  emptyState.hidden = visibleCount > 0;
  productGrid.setAttribute("aria-live", query ? "polite" : "off");
});

document.querySelectorAll(".order-button").forEach((button) => {
  button.addEventListener("click", () => {
    button.textContent = "Added";
    button.disabled = true;

    window.setTimeout(() => {
      button.textContent = "Order Now";
      button.disabled = false;
    }, 1200);
  });
});
