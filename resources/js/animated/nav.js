gsap.registerPlugin(ScrollTrigger);
gsap.defaults({ease:"none", duration:10})

const t1 = gsap.timeline();
t1.from(".html", {xPercent: 0})
  .from(".css", {xPercent: -100})
  .from(".js", {xPercent: 100})
  .from(".php", {xPercent: -100})

ScrollTrigger.create({
    animation:t1,
    trigger: "#container",
    start: "top top",
    end: "+=4000",
    scrub: true,
    pin: true,
    anticipatePin: 1
})



gsap.registerPlugin(Flip, Draggable);

const fullSize = document.querySelector(".full-size"),
      thumbnail = document.querySelector(".thumbnail");

Draggable.create(".initial", {bounds: ".hero"});

document.getElementById('imgSvg').addEventListener("click", () => {
  const state = Flip.getState(".thumbnail, .full-size");

  fullSize.classList.toggle("active");
  thumbnail.classList.toggle("active");

  Flip.from(state, {
    duration: 0.6,
    fade: true,
    absolute: true,
    toggleClass: "flipping",
    ease: "power1.inOut"
  });
  
});
