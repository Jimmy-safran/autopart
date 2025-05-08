function toggleReferences() {
    const referencesList = document.getElementById('equivalentReferencesList');
    const plusIcon = document.getElementById('plusIcon');
    const minusIcon = document.getElementById('minusIcon');

    referencesList.classList.toggle('expanded');

    if (referencesList.classList.contains('expanded')) {
        plusIcon.style.display = 'none';
        minusIcon.style.display = 'inline-block';
    } else {
        plusIcon.style.display = 'inline-block';
        minusIcon.style.display = 'none';
    }
}

function openModal() {
    console.log('openModal called');
    const modalOverlay = document.getElementById("modalOverlay");
    modalOverlay.style.display = 'flex'; // Directly set the display style
    modalOverlay.classList.add("show"); // Keep this in case other styles in .show are important
}

function closeModal() {
    const modalOverlay = document.getElementById("modalOverlay");
    modalOverlay.style.display = 'none'; // Directly set the display style
    modalOverlay.classList.remove("show");
}
