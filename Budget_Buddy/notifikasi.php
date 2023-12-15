<?php

date_default_timezone_set('Asia/Jakarta');
$currentTime = time();

if (!empty($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $result_notifikasi = mysqli_query($conn, "SELECT * FROM pengingat WHERE id_user = $id_user AND deskripsi = 'deskripsi'");

    $notifications_html = ''; // Variable to store notifications HTML

    while ($notif = mysqli_fetch_assoc($result_notifikasi)) {
        $targetDateTime = strtotime($notif['periode']);
        $h2Time = $targetDateTime - (2 * 24 * 3600);
        $h1Time = $targetDateTime - (1 * 24 * 3600);
        $hours12Time = $targetDateTime - (12 * 3600);
        $hours1Time = $targetDateTime - 3600;

        if ($currentTime >= $h2Time && $currentTime < $h1Time) {
            $notifications_html .= '<li class="mb-2">
                <a class="dropdown-item border-radius-md">
                    <div class="d-flex py-1">
                        <div class="my-auto">
                            <i class="ni ni-time-alarm text-lg opacity-10" aria-hidden="true" style="margin-right:19px;"></i>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="text-sm font-weight-normal mb-1" style="color:black !important;">
                                <span class="font-weight-bold">New Notification</span> from Task
                            </h6>
                            <p class="text-xs text-secondary mb-0">
                                <i class="fa fa-clock me-1"></i>
                                Tugas ' . $notif['deskripsi'] . ' berahkir pada ' . $notif['periode'] . '
                            </p>
                        </div>
                    </div>
                </a>
            </li>';
        } elseif ($currentTime >= $h1Time && $currentTime < $hours12Time) {
            $notifications_html .= '<li class="mb-2">
                <a class="dropdown-item border-radius-md">
                    <div class="d-flex py-1">
                        <div class="my-auto">
                            <i class="ni ni-time-alarm text-lg opacity-10" aria-hidden="true" style="margin-right:19px;"></i>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="text-sm font-weight-normal mb-1" style="color:black !important;">
                                <span class="font-weight-bold">New Notification</span> from Task
                            </h6>
                            <p class="text-xs text-secondary mb-0">
                                <i class="fa fa-clock me-1"></i>
                                Tugas ' . $notif['deskripsi'] . ' berahkir pada ' . $notif['periode'] . '
                            </p>
                        </div>
                    </div>
                </a>
            </li>';
        } elseif ($currentTime >= $hours12Time && $currentTime < $hours1Time) {
            $notifications_html .= '<li class="mb-2">
                <a class="dropdown-item border-radius-md">
                    <div class="d-flex py-1">
                        <div class="my-auto">
                            <i class="ni ni-time-alarm text-lg opacity-10" aria-hidden="true" style="margin-right:19px;"></i>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="text-sm font-weight-normal mb-1" style="color:black !important;">
                                <span class="font-weight-bold">New Notification</span> from Task
                            </h6>
                            <p class="text-xs text-secondary mb-0">
                                <i class="fa fa-clock me-1"></i>
                                Tugas ' . $notif['deskripsi'] . ' berahkir pada ' . $notif['periode'] . '
                            </p>
                        </div>
                    </div>
                </a>
            </li>';
        } elseif ($currentTime >= $hours1Time && $currentTime < $targetDateTime) {
            $notifications_html .= '<li class="mb-2">
                <a class="dropdown-item border-radius-md">
                    <div class="d-flex py-1">
                        <div class="my-auto">
                            <i class="ni ni-time-alarm text-lg opacity-10" aria-hidden="true" style="margin-right:19px;"></i>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="text-sm font-weight-normal mb-1" style="color:black !important;">
                                <span class="font-weight-bold">New Notification</span> from Task
                            </h6>
                            <p class="text-xs text-secondary mb-0">
                                <i class="fa fa-clock me-1"></i>
                                Tugas ' . $notif['deskripsi'] . ' berahkir pada ' . $notif['periode'] . '
                            </p>
                        </div>
                    </div>
                </a>
            </li>';
        }
    }

    if (!empty($notifications_html)) {
        echo '<ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">' . $notifications_html . '</ul>';
    }
}
?>
