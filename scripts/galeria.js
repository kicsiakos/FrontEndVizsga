(function () {

    document.querySelectorAll('.kep').forEach(kep => {

        kep.addEventListener('mouseover', function () {

            kep.children[0].style.display = 'block';

        });

        kep.addEventListener('mouseout', function () {

            kep.children[0].style.display = 'none';


        })
    })
})()