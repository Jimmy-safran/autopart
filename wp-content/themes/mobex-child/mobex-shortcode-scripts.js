
    function toggleReferences(listId, plusId, minusId) {
        const referencesList = document.getElementById(listId);
        const plusIcon = document.getElementById(plusId);
        const minusIcon = document.getElementById(minusId);

        if (!referencesList || !plusIcon || !minusIcon) {
            console.error('One or more elements not found:', listId, plusId, minusId);
            return;
        }

        referencesList.classList.toggle('expanded');

        if (referencesList.classList.contains('expanded')) {
            plusIcon.style.display = 'none';
            minusIcon.style.display = 'inline-block';
        } else {
            plusIcon.style.display = 'inline-block';
            minusIcon.style.display = 'none';
        }
    }

    function openModal(modalId) {
        const modalOverlay = document.getElementById(modalId);
        if (modalOverlay) {
            modalOverlay.style.display = 'flex';
            modalOverlay.classList.add("show");
        } else {
            console.error('Modal overlay element not found:', modalId);
        }
    }

    function closeModal(modalId) {
        const modalOverlay = document.getElementById(modalId);
        if (modalOverlay) {
            modalOverlay.style.display = 'none';
            modalOverlay.classList.remove("show");
        } else {
            console.error('Modal overlay element not found:', modalId);
        }
    }

