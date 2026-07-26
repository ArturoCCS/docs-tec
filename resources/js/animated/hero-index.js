gsap.registerPlugin(ScrollTrigger);
gsap.defaults({ ease: "none", duration: 10 });

const t1 = gsap.timeline();
t1.from(".html", { xPercent: 0 })
  .from(".css", { xPercent: -100 })
  .from(".js", { xPercent: 100 })
  .from(".php", { xPercent: -100 });

ScrollTrigger.create({
    animation: t1,
    trigger: "#container",
    start: "top top",
    end: "+=4000",
    scrub: true,
    pin: true,
    anticipatePin: 1
});


const footer = document.querySelector("#footer");
const blocks = gsap.utils.toArray(".blocky-item");

const customOffsets = [
    { stack: -20,  x: 0,   rot: 0 },
    { stack: 10, x: -100,  rot: -200 },
    { stack: 20, x: 80, rot: 27 },

    { stack: -20, x: 30,  rot: 0 },
    { stack: -20, x: -40, rot: 0 },

    { stack: 30, x: 200,  rot: 0 },
    { stack: 36, x: -190, rot: 0},

    { stack: -20, x: 30,  rot: 0 },
    { stack: -20, x: -40, rot: 0 },
];


function getRestingBottom(el) {
    let top = 0;
    let node = el;
    while (node) {
        top += node.offsetTop;
        node = node.offsetParent;
    }
    return top + el.offsetHeight;
}

let originalBottoms = blocks.map(b => getRestingBottom(b));

function computeLandingY(i) {
    const footerRect = footer.getBoundingClientRect();
    const footerBottomAbs = footerRect.bottom + window.scrollY;
    const offset = customOffsets[i] || { stack: i };

    const distanceToFloor = footerBottomAbs - originalBottoms[i];
    return distanceToFloor  - offset.stack;
}

const t2 = gsap.timeline();
t2.to(".blocky-item", { y: 500, duration: 0.3, stagger: 0.05 })
  .to(".blocky-item", {
        y: (i) => computeLandingY(i),
        x: (i) => (customOffsets[i]?.x ?? 0),
        rotation: (i) => (customOffsets[i]?.rot ?? 0),
        ease: "bounce.out",
        duration: 1.2,
        stagger: 0.08
    })
  .to(blocks[0], {
        opacity: 1,
        duration: 1.2,
        ease: "power1.in"
    }, "<")
  .to(blocks[7], {
        opacity: 1,
        duration: 1.2,
        ease: "power1.in"
    }, "<")
   .to(blocks[8], {
        opacity: 1,
        duration: 1.2,
        ease: "power1.in"
    }, "<");
    
    
ScrollTrigger.create({
    animation: t2,
    trigger: "#container",
    start: "top bottom",
    end: "bottom bottom",
    scrub: 1,
    invalidateOnRefresh: true,
    onRefresh: () => {
        // recalcula solo si el layout cambió (imágenes, resize) — ya no se contamina con transform
        originalBottoms = blocks.map(b => getRestingBottom(b));
    }
});

window.addEventListener("load", () => ScrollTrigger.refresh());
