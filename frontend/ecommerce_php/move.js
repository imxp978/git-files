const movable = document.querySelector(".movable");

function isElementInViewport(el) {
  const rect = el.getBoundingClientRect();
  return rect.bottom < 0 || rect.top + 200 >= window.innerHeight;
}

function addClassToVisibleElements() {
  const movable = document.querySelectorAll(".movable");
  movable.forEach(function (movable) {
    if (!isElementInViewport(movable)) movable.classList.add("ed");
    else movable.classList.remove("ed");
  });
}

document.addEventListener("scroll", addClassToVisibleElements);
addClassToVisibleElements();