
    const wrapper = document.querySelector('.wrapper');
    const loginLinks = document.querySelectorAll('.login-link');
    const registerLink = document.querySelector('.register-link');
    const forgotLink = document.querySelector('.remember-forgot a');
    const closeBtn = document.querySelector('.close');
    const params = new URLSearchParams(window.location.search);

    registerLink.addEventListener('click', (e) => {
        e.preventDefault();
        wrapper.classList.add('active');
        wrapper.classList.remove('show-forgot');
    });

    loginLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            wrapper.classList.remove('active');
            wrapper.classList.remove('show-forgot');
        });
    });

    forgotLink.addEventListener('click', (e) => {
        e.preventDefault();
        wrapper.classList.add('show-forgot');
    });

    closeBtn.addEventListener('click', () => {
    window.location.href = "Home.php";
    });

    if (params.get("show") === "register") {
    wrapper.classList.add("active");
}
