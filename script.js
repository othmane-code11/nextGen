let contacts = [];
document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("form-container");
    const nameInput = document.getElementById("nom");
    const emailInput = document.getElementById("email");
    const submitBtn = document.getElementById("sbmbtn");

    form.addEventListener("submit", (e) => {
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

    // Email format validation
    function validateEmail(email) {
        let regexEmail = /^[a-zA-Z0-9]+([-_.][A-Za-z0-9])*@[a-zA-Z0-9]+\.[a-zA-Z0-9]{2,4}$/
        return regexEmail.test(email.toLowerCase());
    }
});
    const toggleBtn = document.getElementById('toggle-theme');
    toggleBtn.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
    });


    document.getElementById('supprimer').addEventListener('click', (e) => {
        // e.preventDefault();
        if (confirm("Voulez-vous vraiment supprimer ce contact ?")){
            alert('contact supprimer avec succes!');
        }
    });

    

// let contacts = [];
// let modifierMode = false;
// let indexMode = null;

// function generateId() {
//     return Date.now() * Math.floor(Math.random() * 100);
// }

// document.getElementById('form-container').addEventListener('submit', (e) => {
//     e.preventDefault();
//     let nom = document.getElementById('nom').value;
//     let email = document.getElementById('email').value;

//     let messages = document.querySelectorAll('.errors');
//     messages.forEach(msg => msg.innerHTML = '');

//     let id = modifierMode ? contacts[indexMode].id : generateId();
//     let isValid = true;

//     if (nom.trim() === '') {
//         document.getElementById('nom_error').textContent = 'le champ nom est obligatoire';
//         isValid = false;
//     }
//     let regexEmail = /^[a-zA-Z0-9]+([-_.][A-Za-z0-9])*@[a-zA-Z0-9]+\.[a-zA-Z0-9]{2,4}$/
//     if (email.trim() === '') {
//         document.getElementById('email_error').textContent = 'le champ email est obligatoire';
//         isValid = false;
//     }
//     else if (!regexEmail.test(email)) {
//         document.getElementById('email_error').textContent = 'Invalid Email';
//         isValid = false;
//     }
//     else if (contacts.some(c => c.email === email) && !modifierMode) {
//         document.getElementById('email_error').textContent = 'email doit etre unique';
//         isValid = false;
//     }
//     if (contacts.some(c => c.id === id) && !modifierMode) {
//         alert('Generer un nouveau id');
//         isValid = false;
//     }

//     if (!isValid) {
//         return false;
//     }

//     let contact = {
//         id, 
//         nom,
//         email
//     };

//     if (modifierMode) {
//         contacts[indexMode] = contact;
//         modifierMode = false
//         indexMode = null;
//         document.getElementById('sbmbtn').textContent = 'Ajouter Contact';

//     }
//     else {
//         contacts.push(contact);
//     }
//     updateTable();
//     document.getElementById('form-container').reset();
// });

// function updateTable() {
//     let tbody = document.getElementById('contact-table-body');
//     tbody.innerHTML = '';

//     contacts.forEach((c, index) => {
//         let row = document.createElement('tr');
//         row.innerHTML = `
//             <td>${c.id}</td>
//             <td>${c.nom}</td>
//             <td>${c.email}</td>
//             <td>
//                 <button onclick='supprimerContact(${c.id})'>Suprimer</button>
//                 <button onclick='modifierContact(${c.id})'>modifier</button>
//             </td>
//         `;
//         tbody.appendChild(row);
//     });
// };

// function supprimerContact(id) {
//     let index = contacts.findIndex(c => c.id === id);  //find the iindex 
//     if (index !== -1) {
//         if (confirm('are you sure?')) {
//             contacts.splice(index, 1);
//             updateTable();
//         }
//     }
// }

// function modifierContact(id) {
//     let index = contacts.findIndex(c => c.id === id);
//     if (index !== -1) {
//         let user = contacts[index];
//         document.getElementById('nom').value = user.nom;
//         document.getElementById('email').value = user.email;
    
//         modifierMode = true;
//         indexMode = index;
//         document.getElementById('sbmbtn').textContent = 'Modifier Contact';
//     }
// }