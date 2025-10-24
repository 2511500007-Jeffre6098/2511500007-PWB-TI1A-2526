const homeSection = document.getElementById("home");
    const ucapan = document.createElement("p");
    ucapan.textContent = "Enjoy testing around!";
    homeSection.appendChild(ucapan);

document.getElementById("menuToggle").addEventListener("click", function () {
    const nav = document.querySelector("nav"); nav.classList.toggle("active");
    console.log("Expanded")
    if (nav.classList.contains("active")) {

        this.textContent = "\u2716";
    } else {
        this.textContent = "\u2630";
    }
});


document.querySelector("form").addEventListener("submit", function (e) {
    const name = document.getElementById("txtNama");
    const email = document.getElementById("txtEmail");
    const pesan = document.getElementById("txtPesan");

    document.querySelectorAll(".error-msg").forEach(el => el.remove());
    [name, email, pesan].forEach(el => el.style.border = "");

    let isValid = true;
    console.log("Email Confirmed")
    if (name.value.trim().length < 3) {
        showError(name, "Please enter your name and must minimum 3 characters")
        isValid = false;
        console.log("Name Is Not Valid")
    } else if (!/^[A-Za-z\s]+$/.test(name.value)) {
        showError(name, "Only space and letter is allowed");
        isValid = false;
        console.log("Symbol Name Invalid")
    }

    if (email.value.trim() === "") {
        showError(email, "Please enter your email");
        isValid = false;
        console.log("Empty Email Detected")
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
        showError(email, "Invalid email format. example123@gmail.com");
        console.log("Invalid Email Format Detected")
        isValid = false;
    }

    if (pesan.value.trim().length < 10) {
        showError(pesan, "pesan minimum 10 characters for clarity.");
        isValid = false;
        console.log("pesan Not Met The Requirement")
    }

    if (!isValid) {
        e.preventDefault();
    } else {
        alert("Thank You for your feedback, " + name.value + "!\nYour pesan has been sent");
        console.log("Submission Completed")
    }
});
function showError(inputElement, pesan) {
    const label = inputElement.closest("label");
    if (!label) return;
    label.style.flexWrap = "wrap";
    const small = document.createElement("small");
    small.className = "error-msg";
    small.textContent = pesan;
    small.style.color = "red";
    small.style.fontSize = "14px";
    small.style.display = "block";
    small.style.marginTop = "4px";
    small.style.flexBasis = "100%";
    small.dataset.forId = inputElement.id;

    if (inputElement.nextSibling) {
        label.insertBefore(small, inputElement.nextSibling);
    } else {
        label.appendChild(small);
    }

    inputElement.style.border = "1px solid red";

    alignErrorpesan(small, inputElement);
}

function alignErrorpesan(smallEl, inputEl) {
    const isMobile = window.matchMedia("(max-width: 600px)").matches;
    if (isMobile) {
        smallEl.style.marginLeft = "0";
        smallEl.style.width = "100%";
        return;
    }

    const label = inputEl.closest("label");
    if (!label) return;

    const rectLabel = label.getBoundingClientRect();
    const rectInput = inputEl.getBoundingClientRect();
    const offsetLeft = Math.max(0, Math.round(rectInput.left - rectLabel.left));

    smallEl.style.marginLeft = offsetLeft + "px";
    smallEl.style.width = Math.round(rectInput.width) + "px";
}

window.addEventListener("resize", () => {
    document.querySelectorAll(".error-msg").forEach(small => {
        const target = document.getElementById(small.dataset.forId);
        if (target) alignErrorpesan(small, target);
    });
});

document.getElementById("txtPesan").addEventListener("input", function () {
    const panjang = this.value.length;
    document.getElementById("charCount").textContent = panjang + "/400 characters";
});

document.addEventListener("DOMContentLoaded", function () {  
     
    function setupCharCountLayout() {
        const label = document.querySelector('label[for="txtpesan"]');
        if (!label) return;

        let wrapper = label.querySelector('[data-wrapper="pesan-wrapper"]');
        const span = label.querySelector('span');
        const textarea = document.getElementById('txtpesan');
        const counter = document.getElementById('charCount');
        if (!span || !textarea || !counter) return;

        if (!wrapper) {
            wrapper = document.createElement('div');
            wrapper.dataset.wrapper = 'pesan-wrapper';
            wrapper.style.width = '100%';
            wrapper.style.flex = '1';
            wrapper.style.display = 'flex';
            wrapper.style.flexDirection = 'column';

            label.insertBefore(wrapper, textarea);
            wrapper.appendChild(textarea);
            wrapper.appendChild(counter);

            textarea.style.width = '100%';
            textarea.style.boxSizing = 'border-box';
            counter.style.color = '#555';
            counter.style.fontSize = '14px';
            counter.style.marginTop = '4px';
        }

        applyResponsiveLayout();
    }
    function applyResponsiveLayout() {
        const label = document.querySelector('label[for="txtPesan"]');
        const span = label?.querySelector('span');
        const wrapper = label?.querySelector('[data-wrapper="pesan-wrapper"]');
        const counter = document.getElementById('charCount');
        if (!label || !span || !wrapper || !counter) return;

        const isMobile = window.matchMedia('(max-width: 600px)').matches;

        if (isMobile) {
            label.style.display = 'flex';
            label.style.flexDirection = 'column';
            label.style.alignItems = 'flex-start';
            label.style.width = '100%';

            span.style.minWidth = 'auto';
            span.style.textAlign = 'left';
            span.style.paddingRight = '0';
            span.style.flexShrink = '0';
            span.style.marginBottom = '4px';

            wrapper.style.flex = '1';
            wrapper.style.display = 'flex';
            wrapper.style.flexDirection = 'column';

            counter.style.alignSelf = 'flex-end';
            counter.style.width = 'auto';
        } else {
            label.style.display = 'flex';
            label.style.flexDirection = 'row';
            label.style.alignItems = 'baseline';
            label.style.width = '100%';

            span.style.minWidth = '180px';
            span.style.textAlign = 'right';
            span.style.paddingRight = '16px';
            span.style.flexShrink = '0';
            span.style.marginBottom = '0';

            wrapper.style.flex = '1'; 
            wrapper.style.display = 'flex'; 
            wrapper.style.flexDirection = 'column'; 
            counter.style.alignSelf = 'flex-end'; 
            counter.style.width = 'auto';
        }
    } setupCharCountLayout();
    window.addEventListener('resize', applyResponsiveLayout);  
     
});  
