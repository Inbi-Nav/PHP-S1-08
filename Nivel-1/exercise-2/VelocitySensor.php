<?php
class VelocitySensor {
    public function checkSpeed($speed) {
        if ($speed < 30) {
            return "Very slow";
        } elseif ($speed >= 30 && $speed <= 60) {
            return "Adequate speed";
        } elseif ($speed >= 61 && $speed <= 80) {
            return "Mild excess";
        } elseif ($speed >= 81 && $speed <= 100) {
            return "Moderate excess";
        } else {
            return "Severe excess";
        }
    }
}
?>
