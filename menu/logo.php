<?php
include '../header.php';

include '../config/database.php';
$slug = 'logo'; // Ganti sesuai slug menu
$data = $conn->query("SELECT * FROM menu WHERE slug='$slug'")->fetch_assoc();

if (!$data) {
    $data = [
        'judul' => ucfirst($slug) . ' SI-BORI',
        'konten' => 'Konten belum tersedia. Silakan hubungi administrator.'
    ];
}
?>

<div class="container py-5">
    <h2 class="text-center mb-4"><?php echo htmlspecialchars($data['judul']); ?></h2>

    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="content">
                        <?php echo nl2br(htmlspecialchars($data['konten'])); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../footer.php'; ?>
