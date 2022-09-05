
$(document).ready(function () {

});
document.addEventListener("DOMContentLoaded", function(event) {

    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            body = document.getElementById(bodyId),
            header = document.getElementById(headerId)

        // Validate that all variables exist
        if(toggle && nav && body && header){
            toggle.addEventListener('click', ()=>{
                if ($(window).width() < 768) {
                    // show navbar
                    nav.classList.remove('nav-toogle-active')
                    nav.classList.toggle('nav-toogle-active-sm')
                    // change icon
                    //toggle.classList.toggle('fa-xmark')
                    // add padding to body
                    body.classList.remove('nav-toogle-active')
                    body.classList.toggle('nav-toogle-active-sm')
                    // add padding to header
                    header.classList.remove('nav-toogle-active')
                    header.classList.toggle('nav-toogle-active-sm')
                }
                else {
                    // show navbar
                    nav.classList.remove('nav-toogle-active-sm')
                    nav.classList.toggle('nav-toogle-active')
                    // change icon
                    //toggle.classList.toggle('fa-xmark')
                    // add padding to body
                    body.classList.remove('nav-toogle-active-sm')
                    body.classList.toggle('nav-toogle-active')
                    // add padding to header
                    header.classList.remove('nav-toogle-active-sm')
                    header.classList.toggle('nav-toogle-active')
                }

            })
        }
    }

    showNavbar('header-toggle','nav-bar','main','header')

    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')

    function colorLink(){
        if(linkColor){
            linkColor.forEach(l=> l.classList.remove('active'))
            this.classList.add('active')
        }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))

    // Your code to run since DOM is loaded and ready
});
function printableDiv(printableAreaDivId) {
    var printContents = document.getElementById(printableAreaDivId).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}
