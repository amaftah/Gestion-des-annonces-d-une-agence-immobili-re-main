const supp = document.querySelectorAll('.supp');
supp = Array.from(supp);
supp.forEach(element => {
    element.addEventListener('click', function(e) {
        e.preventDefault();
        if (confirm('Voulez-vous vraiment supprimer cette annonce ?')) {
            this.parentNode.submit();
        }
    });
});
const  modif = document.querySelectorAll('.modif');
modif = Array.from(modif);
modif.forEach(element => {
    element.addEventListener('click', function(e) {
        e.preventDefault();
        if (confirm('Voulez-vous vraiment modifier cette annonce ?')) {
            this.parentNode.submit();
        }
    });
});


