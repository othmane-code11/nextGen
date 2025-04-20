let contacts = [];
document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("form-container");
    const nameInput = document.getElementById("nom");
    const emailInput = document.getElementById("email");
    const submitBtn = document.getElementById("sbmbtn");

    form?.addEventListener("submit", (e) => {
        const name = nameInput.value.trim();
        const email = emailInput.value.trim();

        if (name === "" || email === "") {
            e.preventDefault();
            alert("Veuillez remplir tous les champs !");
        } else if (!validateEmail(email)) {
            e.preventDefault();
            alert("Veuillez saisir un email valide !");
        } else {
            const confirmSubmit = confirm("Voulez-vous vraiment ajouter ce contact ?");
            if (!confirmSubmit) {
                e.preventDefault();
            }
        }
    });

    // Handle update buttons
    document.querySelectorAll('.modifier-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const row = this.closest('tr');
            const actionButtons = row.querySelector('.action-buttons');
            const updateForm = row.querySelector('.update-form');
            
            actionButtons.style.display = 'none';
            updateForm.style.display = 'block';
        });
    });

    // Handle cancel buttons
    document.querySelectorAll('.cancel-update').forEach(btn => {
        btn.addEventListener('click', function() {
            const row = this.closest('tr');
            const actionButtons = row.querySelector('.action-buttons');
            const updateForm = row.querySelector('.update-form');
            
            actionButtons.style.display = '';
            updateForm.style.display = 'none';
        });
    });

    // Handle delete buttons
    document.querySelectorAll('.supprimer-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            if (!confirm("Voulez-vous vraiment supprimer ce contact ?")) {
                e.preventDefault();
            }
        });
    });

    function validateEmail(email) {
        let regexEmail = /^[a-zA-Z0-9]+([-_.][A-Za-z0-9])*@[a-zA-Z0-9]+\.[a-zA-Z0-9]{2,4}$/
        return regexEmail.test(email.toLowerCase());
    }
});

const toggleBtn = document.getElementById('toggle-theme');
toggleBtn.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
});