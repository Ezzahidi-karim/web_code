$(document).ready(function() {

    let darkMode = localStorage.getItem('darkMode');
    let hardMode = localStorage.getItem('hardMode');
    const darkModeToggle = document.querySelector('#light_dark');

    const enableDarkMode = () => {
        document.body.classList.add('darkmode');
        localStorage.setItem('darkMode', 'enabled');
        $('#bspace_w').show('fast');
        $('#bspace').hide('fast');
        document.getElementById("switch").checked = true;

    }

    const disableDarkMode = () => {
        document.body.classList.remove('darkmode');
        localStorage.setItem('darkMode', null);
        $('#bspace_w').hide('fast');
        $('#help_b').hide('fast');
        $('#bspace').show('fast');
        document.getElementById("switch").checked = false;

    }

    const enableHardMode = () => {
        localStorage.setItem('hardMode', 'enabled');
        document.getElementById("switch_hard").checked = true;

    }

    const disableHardMode = () => {
        localStorage.setItem('hardMode', null);
        document.getElementById("switch_hard").checked = false;

    }
    if (darkMode === 'enabled') {
        enableDarkMode();
    }

    if (hardMode === 'enabled') {
        enableHardMode();
    }

    $('#light_dark').click(function() {
        darkMode = localStorage.getItem('darkMode');

        if (darkMode !== 'enabled') {
            enableDarkMode();
        } else {

            disableDarkMode();
        }
    });

    $('#hard').click(function() {
        hardMode = localStorage.getItem('hardMode');

        if (hardMode !== 'enabled') {
            enableHardMode();
        } else {

            disableHardMode();
        }
    });
});