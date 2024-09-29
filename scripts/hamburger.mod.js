const hamburgetMenu = () => {

    const hambi = document.querySelector('#hambimenu');
    const hambiUL = document.querySelector('ul');

    hambi.addEventListener('click', () => {

            if (hambiUL.style.display === "none") {
                hambiUL.style.display = "flex";
            } else {
                hambiUL.style.display = "none";
            }

        })

    }

export {hamburgetMenu};