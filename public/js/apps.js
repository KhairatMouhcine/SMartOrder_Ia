document.addEventListener("mousemove", (event) => {
    const x = event.clientX / window.innerWidth - 0.5;
    const y = event.clientY / window.innerHeight - 0.5;

    document.querySelectorAll(".parallax").forEach((element) => {
        const speed = element.getAttribute("data-speed");
        element.style.transform = `translate(${x * speed * 20}px, ${y * speed * 20}px)`;
    })
})

// SIGNIN PAGE OPEN AND CLOSE ANIMATION

const signinButton = document.getElementById('signinButton');
const signinPage = document.getElementById('signinPage');
const closeIcon = document.getElementById('closeIcon');



// SIDEBAR ELEMENTS
const sideBar = document.querySelector('.sidebar');
const menuButton = document.querySelector('.menu-icon');
const closeButton = document.querySelector('.close-icon');

// OPEN SIDEBAR
menuButton.addEventListener("click", function(){
    sideBar.classList.remove('close-sidebar')
    sideBar.classList.add('open-sidebar')
})

closeButton.addEventListener("click", function(){
    sideBar.classList.remove('open-sidebar')
    sideBar.classList.add('close-sidebar')
})



// SIGNIN PAGE OPEN AND CLOSE ANIMATION



const RegisternButton = document.getElementById('RegisternButton');
const RegisterPage = document.getElementById('RegisterPage');
const closeIconR = document.getElementById('closeIconR');
const signinButtonAlt = document.getElementById('signinButtonAlt');

// SHOW SIGNIN FORM
signinButton.addEventListener('click', function(){
    signinPage.classList.remove('closeSignin');
    signinPage.classList.add('openSignin');
    RegisterPage.classList.remove('openSignin');
    RegisterPage.classList.add('closeSignin');
});

// CLOSE SIGNIN FORM
closeIcon.addEventListener('click', function(){
    signinPage.classList.remove('openSignin');
    signinPage.classList.add('closeSignin');
});

// SHOW REGISTER FORM
RegisternButton.addEventListener('click', function(){
    RegisterPage.classList.remove('closeSignin');
    RegisterPage.classList.add('openSignin');
    signinPage.classList.remove('openSignin');
    signinPage.classList.add('closeSignin');
});

// CLOSE REGISTER FORM
closeIconR.addEventListener('click', function(){
    RegisterPage.classList.remove('openSignin');
    RegisterPage.classList.add('closeSignin');
});

// BACK TO SIGNIN FROM REGISTER
signinButtonAlt.addEventListener('click', function(){
    signinPage.classList.remove('closeSignin');
    signinPage.classList.add('openSignin');
    RegisterPage.classList.remove('openSignin');
    RegisterPage.classList.add('closeSignin');
});
const RegisternButtonAlt = document.getElementById('RegisternButtonAlt');

RegisternButtonAlt.addEventListener('click', function(){
    RegisterPage.classList.remove('closeSignin');
    RegisterPage.classList.add('openSignin');
    signinPage.classList.remove('openSignin');
    signinPage.classList.add('closeSignin');
});

// Récupération des éléments
const formSignin = document.getElementById('signinPage');
const formRegister = document.getElementById('RegisterPage');

// Nouveaux boutons
const btnOpenRegister = document.getElementById('btn-open-register');
const btnOpenSignin = document.getElementById('btn-open-signin');

// Boutons de fermeture
const closeSignin = document.getElementById('closeIcon');
const closeRegister = document.getElementById('closeIconR');

// Ouvre le formulaire d'inscription
btnOpenRegister?.addEventListener('click', function(e) {
    e.preventDefault();
    formRegister.classList.remove('closeSignin');
    formRegister.classList.add('openSignin');
    formSignin.classList.remove('openSignin');
    formSignin.classList.add('closeSignin');
});

// Ouvre le formulaire de connexion
btnOpenSignin?.addEventListener('click', function() {
    formSignin.classList.remove('closeSignin');
    formSignin.classList.add('openSignin');
    formRegister.classList.remove('openSignin');
    formRegister.classList.add('closeSignin');
});

// Fermer le formulaire de connexion
closeSignin?.addEventListener('click', function() {
    formSignin.classList.remove('openSignin');
    formSignin.classList.add('closeSignin');
});

// Fermer le formulaire d'inscription
closeRegister?.addEventListener('click', function() {
    formRegister.classList.remove('openSignin');
    formRegister.classList.add('closeSignin');
});
