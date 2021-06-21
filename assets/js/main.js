// $(window).scroll(function () {
//     var scrollTop = $(this).scrollTop();

//     $("header").css({
//         opacity: function () {
//             var elementHeight = $(this).height();
//             return 1 - (elementHeight - scrollTop) / elementHeight;
//         },
//     });
// });

// console.log("ok");

const header = document.querySelector("header");
const articles = document.querySelector(".articles");
const galery = document.querySelector(".galery");

const observer1 = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            console.log("Entry :", entry.isIntersecting);
            console.log("Entry :", entry.boundingClientRect);
            if (entry.boundingClientRect.y < 0) {
                header.classList.add("header-scroll");
            }
            if (entry.isIntersecting) {
                header.classList.remove("header-scroll");
            }
        });
    },
    { threshold: 0.5, rootMargin: "100px" }
);

const observer2 = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            console.log("Entry :", entry.isIntersecting);
            console.log("Entry :", entry.boundingClientRect);
            if (entry.boundingClientRect.y < 0) {
                header.classList.add("header-galery");
            }
            if (entry.isIntersecting) {
                header.classList.remove("header-galery");
            }
        });
    },
    { threshold: 0.5, rootMargin: "100px" }
);

observer1.observe(articles);
observer2.observe(galery);
