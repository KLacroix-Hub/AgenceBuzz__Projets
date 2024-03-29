if(window.innerWidth > 700){
    const hero = document.querySelector('.main-preenter');

const settings = {
    isEnable: false,
    count : 1,
    time : 50,
}

const images = [
    "./wp-content/themes/caillou/assets/img/preenter/1.png",
    "./wp-content/themes/caillou/assets/img/preenter/2.png",
    "./wp-content/themes/caillou/assets/img/preenter/3.png",
    "./wp-content/themes/caillou/assets/img/preenter/4.png",
    "./wp-content/themes/caillou/assets/img/preenter/5.png",
    "./wp-content/themes/caillou/assets/img/preenter/6.png",
    "./wp-content/themes/caillou/assets/img/preenter/7.png",
    "./wp-content/themes/caillou/assets/img/preenter/8.png",
    "./wp-content/themes/caillou/assets/img/preenter/9.png",
    "./wp-content/themes/caillou/assets/img/preenter/10.png",
    "./wp-content/themes/caillou/assets/img/preenter/11.png",
    "./wp-content/themes/caillou/assets/img/preenter/12.png",
    "./wp-content/themes/caillou/assets/img/preenter/13.png",
    "./wp-content/themes/caillou/assets/img/preenter/14.png",
    "./wp-content/themes/caillou/assets/img/preenter/15.png",

];

const preloadImages = () => {
    for(let i = 0; i < images.length; i++) {
        let link = document.createElement('link');
        link.rel = 'preload';
        link.as = 'image';
        link.href = images[i];
        document.head.appendChild(link);
    }
}

const calcIndex = (length) => {
    settings.count++;
    if(settings.count == length) settings.count = 0;

    return settings.count;
}

const animateImages = (event) => {
    const image = document.createElement('img');
    const imageSize = 15;

    const countIndex = calcIndex(images.length);

    image.classList.add('main-preenter__image');
    image.setAttribute('src', images[countIndex]);

    image.style.width = `${imageSize}rem`;
    image.style.height = `auto`;
    image.style.position = "absolute";
    image.style.top = event.pageY - (imageSize * 10) / 2 + "px";
    image.style.left = event.pageX - (imageSize * 10) / 2 + "px";

    hero.appendChild(image);

    window.setTimeout(() => {
        image.style.transform = ` scale(1)`;
    }, 50);

    window.setTimeout(() => {
        image.style.opacity = 0;
        image.style.filter = 'blur(10px)';
        image.style.transform = "scale(0.25)";
    }, 500); 

    window.setTimeout(() => {
        hero.removeChild(image);
    }, 1500);
}

window.addEventListener('mousemove', (event) => {
    if(!settings.isEnable){
        settings.isEnable = true;
        

        window.setTimeout(() => {
            settings.isEnable = false;
        }, settings.time);

        animateImages(event);
    }});

window.onload = () => {
    preloadImages();
}

var title = document.querySelector('.title');
var infos = document.querySelector('.main-content__informations');
var main = document.querySelector('#main');

title.onclick = () => {
    hero.classList.add('hidden');
    title.style.top = "0";
    title.style.left = "0";
    infos.style.top = "0";
    infos.style.left = "0";
    main.style.height = "auto";
}

}