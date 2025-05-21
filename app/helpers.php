<?php
if (!function_exists('formatCurrency')) {
    function formatCurrency($amount, $suffix = ' ₫') {
        return number_format($amount, 0, ',', '.') . $suffix;
    }
}



?>