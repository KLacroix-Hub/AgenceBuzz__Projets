    //Animations header
var animationFromTo = [{
    opacity: 0,
    y: 30,
},{
    opacity: 1,
    y: 0,
    duration: 1,
    ease: "power2.out",
}];

gsap.fromTo(
    "#home>img",
    animationFromTo[0],
    animationFromTo[1]
  
)
gsap.fromTo(
    ".menu-nav__link",
    animationFromTo[0],
    {
        opacity: 1,
        y: 0,
        duration: 1,
        ease: "power2.out",
        delay:0.1,
        stagger: 0.1,
    }
)
gsap.fromTo(".catchphrase", animationFromTo[0],{
    opacity: 1,
    y: 0,
    duration: 1,
    ease: "power2.out",
    delay: 0.4,
})

gsap.fromTo("h1,h2,h3,p,a", animationFromTo[0], {
    opacity: 1,
    y: 0,
    duration: 1,
    ease: "power2.out",
    delay:0.1,
    stagger: 0.2,
})

gsap.fromTo(".wrapper-paragraphe__content", animationFromTo[0], {
    y: 0,
    duration: 1,
    ease: "power2.out",
    delay:0.1,
    stagger: 0.2,
})

gsap.fromTo(".content-Dickies", {
    opacity: 0,
    y: 120,
}, {
    opacity: 1,
    y: 0,
    duration: 1,
    ease: "power2.out",
    delay:2,
})