<?php
include '../head.php';
include '../header.php';

include '../config/database.php';

$slug = $_GET['slug'] ?? '';

if (empty($slug)) {
    header("Location: ../index.php");
    exit;
}

$data = $conn->query("SELECT * FROM menu WHERE slug='$slug'")->fetch_assoc();

if (!$data) {
    $data = [
        'judul' => 'Menu Tidak Ditemukan',
        'konten' => 'Menu yang Anda cari tidak tersedia atau belum dibuat.'
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
                    <?php if ($slug == 'dokumentasi'): ?>
<hr class="my-5">
<div class="gallery-grid">
    <div class="gallery-item">
        <img src="../assets/img/dokumentasi/foto1.png" alt="Kegiatan 1">
        <div class="gallery-item-overlay"><span>Kegiatan Siswa 1</span></div>
    </div>
    <div class="gallery-item">
        <img src="../assets/img/dokumentasi/foto2.png" alt="Kegiatan 2">
        <div class="gallery-item-overlay"><span>Kegiatan Siswa 2</span></div>
    </div>
</div>
<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../footer.php'; ?>