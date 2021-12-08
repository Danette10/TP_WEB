
window.addEventListener('scroll', (e) => {
  if (document.documentElement.scrollTop > 250) {
        document.getElementsByTagName('header')[0].style.background = "#0B2E61";
        document.getElementsByTagName('header')[0].style.padding = "10px 30px";
    }
    else {
        document.getElementsByTagName('header')[0].style.background = "#3a4d73";
        document.getElementsByTagName('header')[0].style.padding = "0px 30px";
    }
});
