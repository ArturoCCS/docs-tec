gsap.registerPlugin(Draggable);

const fullSize = document.querySelector(".full-size"),
      thumbnail = document.querySelector(".thumbnail");
gsap.registerPlugin(Flip, Draggable);

Draggable.create(".initial", {bounds: ".limit-hero"});

