<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    .btn-custom {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 5px;
        display: flex;
        align-items: center;
        gap: 10px; /* Space between icon and text */
        transition: background-color 0.3s ease, border-color 0.3s ease, transform 0.3s ease;
    }

    .btn-custom i {
        font-size: 18px; /* Adjust icon size */
        transition: transform 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #14b105;
        border-color: #0056b3;
        transform: scale(1.05); /* Slightly scale the button on hover */
    }

    .btn-custom:hover i {
        transform: scale(1.2); /* Slightly scale the icon on hover */
    }

    .center-container {
        display: flex;
        justify-content: center;
    }
</style>

<div class="center-container">
    <button onclick="window.location.href='{{ route('filament.admin.resources.estates.view', $record) }}'"
        class="btn btn-custom">
        <i class="fas fa-eye"></i> <!-- Eye icon -->
        {{ __('View More Details') }}
    </button>
</div>
