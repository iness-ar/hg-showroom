const carsData = [
    { id: 1, brand: 'Lamborghini', model: 'Aventador', year: 2022, fuel_type: 'Bensin', mileage: 5000, price: 15000000000 },
    { id: 2, brand: 'Porsche', model: '911 Carrera', year: 2023, fuel_type: 'Bensin', mileage: 2500, price: 4500000000 },
    { id: 3, brand: 'Mercedes-Benz', model: 'S-Class', year: 2021, fuel_type: 'Diesel', mileage: 18000, price: 2200000000 },
    { id: 4, brand: 'Tesla', model: 'Model Y', year: 2024, fuel_type: 'Listrik', mileage: 1200, price: 1400000000 },
    { id: 5, brand: 'Ferrari', model: 'Roma', year: 2023, fuel_type: 'Bensin', mileage: 1500, price: 9800000000 },
    { id: 6, brand: 'BMW', model: 'M4 Competition', year: 2022, fuel_type: 'Bensin', mileage: 7000, price: 1800000000 },
    { id: 7, brand: 'BMW', model: 'M2 Competition', year: 2025, fuel_type: 'Bensin', mileage: 4000, price: 1870000000 },
];

const formatRupiah = (number) => 'Rp ' + new Intl.NumberFormat('id-ID').format(number);

const renderCars = (data) => {
    const carList = document.getElementById('car-list');
    const carCount = document.getElementById('car-count');
    const emptyState = document.getElementById('empty-state');

    carCount.textContent = data.length;

    if (data.length === 0) {
        carList.innerHTML = '';
        emptyState.classList.remove('d-none');
        return;
    }

    emptyState.classList.add('d-none');
    carList.innerHTML = data.map(car => `
        <div class="col">
            <div class="card card-elegant h-100 overflow-hidden shadow-lg border-0">
                <div class="position-relative">
                    <img src="https://placehold.co/600x400/1c2336/ff5722?text=${encodeURIComponent(car.brand + ' ' + car.model)}"
                         class="card-img-top"
                         alt="${car.brand} ${car.model}"
                         style="height: 200px; object-fit: cover; border-bottom: 3px solid var(--bs-primary);">
                    <span class="badge rounded-pill bg-primary position-absolute top-0 start-0 m-3 p-2 fw-bold">${car.year}</span>
                </div>
                <div class="card-body pb-0">
                    <h5 class="card-title text-light fw-bolder mb-1">${car.brand} <span class="text-accent">${car.model}</span></h5>
                    <p class="card-text small text-muted mb-3">
                        <i class="fas fa-road me-1"></i> ${new Intl.NumberFormat('id-ID').format(car.mileage)} km &bull;
                        <i class="fas fa-gas-pump me-1"></i> ${car.fuel_type}
                    </p>
                    <p class="h4 fw-bolder text-accent mb-3">${formatRupiah(car.price)}</p>
                </div>
                <div class="card-footer bg-transparent border-top border-secondary d-flex justify-content-between p-3">
                    <button class="btn btn-sm btn-outline-light flex-grow-1 me-2 rounded-pill" onclick="alert('Mengedit mobil ID: ${car.id}')">
                        <i class="fas fa-pen-to-square"></i> Edit
                    </button>
                    <button class="btn btn-sm btn-danger rounded-pill" onclick="if(confirm('Apakah Anda yakin ingin menghapus mobil ini? (ID: ${car.id})')) { alert('Mobil dihapus!'); }">
                        <i class="fas fa-trash-alt"></i> Hapus
                    </button>
                </div>
            </div>
        </div>
    `).join('');
};

document.addEventListener('DOMContentLoaded', () => renderCars(carsData));
