$(document).ready(function() {
    // Initialize dates
    initializeDates();

    // Handle rental days change
    $('.rental-days').change(function() {
        const carId = $(this).data('car-id');
        const days = $(this).val();
        updateCart(carId, 'quantity', days);
    });

    // Handle pickup date change
    $('.pickup-date').change(function() {
        const carId = $(this).data('car-id');
        const pickupDate = $(this).val();
        const returnDate = $(this).closest('tr').find('.return-date').val();
        
        // Ensure return date is after pickup date
        if (new Date(returnDate) <= new Date(pickupDate)) {
            const nextDay = new Date(pickupDate);
            nextDay.setDate(nextDay.getDate() + 1);
            const formattedDate = nextDay.toISOString().split('T')[0];
            $(this).closest('tr').find('.return-date').val(formattedDate);
        }
        
        updateCart(carId, 'pickup_date', pickupDate);
    });

    // Handle return date change
    $('.return-date').change(function() {
        const carId = $(this).data('car-id');
        const returnDate = $(this).val();
        const pickupDate = $(this).closest('tr').find('.pickup-date').val();
        
        // Calculate days between dates
        const days = Math.ceil((new Date(returnDate) - new Date(pickupDate)) / (1000 * 60 * 60 * 24));
        $(this).closest('tr').find('.rental-days').val(days);
        
        updateCart(carId, 'return_date', returnDate);
        updateCart(carId, 'quantity', days);
    });

    function updateCart(carId, field, value) {
        $.ajax({
            url: '/update-cart',
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                car_id: carId,
                field: field,
                value: value
            },
            success: function(response) {
                if (response.success) {
                    // Update price calculations without page reload
                    updatePriceDisplay(response.cart);
                }
            },
            error: function(xhr) {
                console.error('Error updating cart:', xhr);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to update cart. Please try again.'
                });
            }
        });
    }

    function updatePriceDisplay(cart) {
        let total = 0;
        Object.keys(cart).forEach(carId => {
            const item = cart[carId];
            const days = calculateDays(item.pickup_date, item.return_date);
            const subtotal = item.price * days;
            total += subtotal;

            // Update item subtotal display
            $(`#subtotal-${carId}`).text(formatCurrency(subtotal));
        });

        // Update total display
        $('#cart-total').text(formatCurrency(total));
    }

    function calculateDays(pickup, return_date) {
        return Math.max(1, Math.ceil(
            (new Date(return_date) - new Date(pickup)) / (1000 * 60 * 60 * 24)
        ));
    }

    function formatCurrency(amount) {
        return new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND'
        }).format(amount);
    }

    function initializeDates() {
        const today = new Date();
        const tomorrow = new Date(today);
        tomorrow.setDate(tomorrow.getDate() + 1);

        // Set min dates for all date inputs
        $('.pickup-date').each(function() {
            $(this).attr('min', today.toISOString().split('T')[0]);
            if (!$(this).val()) {
                $(this).val(today.toISOString().split('T')[0]);
            }
        });

        $('.return-date').each(function() {
            $(this).attr('min', tomorrow.toISOString().split('T')[0]);
            if (!$(this).val()) {
                $(this).val(tomorrow.toISOString().split('T')[0]);
            }
        });
    }
});
