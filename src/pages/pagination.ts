// test.ts

export function paginate(page: number) {
    const itemsPerPage = 10;
    const cargaisons = document.querySelectorAll('#cargaisonList tr');

    const startIndex = (page - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;

    cargaisons.forEach((cargaison, index) => {
        if (index >= startIndex && index < endIndex) {
            (cargaison as HTMLElement).style.display = 'table-row';
        } else {
            (cargaison as HTMLElement).style.display = 'none';
        }
    });

    const pageInput = document.querySelector('[aria-label="Page actuelle 1"]') as HTMLInputElement;
    pageInput.value = page.toString();
    updateButtons(page, Math.ceil(cargaisons.length / itemsPerPage));
}

export function updateButtons(currentPage: number, totalPages: number) {
    const prevButton = document.querySelector('[aria-label="Précédente"]') as HTMLButtonElement;
    const nextButton = document.querySelector('[aria-label="Suivante"]') as HTMLButtonElement;

    if (!prevButton || !nextButton) {
        console.error("One or more required elements are missing.");
        return;
    }

    prevButton.disabled = currentPage <= 1;
    nextButton.disabled = currentPage >= totalPages;
    const pageInput = document.querySelector('[aria-label="Page actuelle 1"]') as HTMLInputElement;
    pageInput.setAttribute('max', totalPages.toString());
}
