<?php
include '../head.php';
include '../header.php';
include '../config/database.php';

$slug = 'penyusun';
$data = $conn->query("SELECT * FROM menu WHERE slug='$slug'")->fetch_assoc();
if (!$data) {
    $data = ['judul' => 'Seputar Penyusun'];
}

// Ambil foto dari kolom foto di tabel menu (JSON array)
$foto_gallery = [];
if (!empty($data['foto'])) {
    $foto_gallery = json_decode($data['foto'], true);
    if (!is_array($foto_gallery)) {
        $foto_gallery = [$data['foto']];
    }
}
?>

<style>
.penyusun-wrap {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 20px;
    margin-top: 10px;
}
.penyusun-card {
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,0.12);
    transition: transform 0.25s, box-shadow 0.25s;
    cursor: pointer;
    background: #fff;
    padding: 10px;
}
.penyusun-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 28px rgba(0,0,0,0.2);
}
.penyusun-card img {
    width: 100%;
    height: auto;
    display: block;
    border-radius: 8px;
    transition: transform 0.3s;
}
.penyusun-card:hover img { transform: scale(1.03); }

/* Lightbox */
.lb-modal {
    display: none; position: fixed; z-index: 9999;
    top:0; left:0; width:100%; height:100%;
    background: rgba(0,0,0,0.92);
}
.lb-modal.active { display: flex; align-items: center; justify-content: center; }
.lb-img { max-width: 90vw; max-height: 88vh; border-radius: 10px; object-fit: contain; }
.lb-close {
    position: absolute; top: 18px; right: 32px;
    font-size: 42px; color: #fff; cursor: pointer; line-height: 1;
}
.lb-nav {
    position: absolute; top: 50%; transform: translateY(-50%);
    font-size: 48px; color: #fff; cursor: pointer;
    user-select: none; padding: 16px;
}
.lb-prev { left: 16px; }
.lb-next { right: 16px; }

@media (max-width: 576px) {
    .penyusun-wrap { grid-template-columns: repeat(2, 1fr); gap: 12px; }
}
</style>

<div class="container py-5">
    <h2 class="text-center mb-5 fw-bold"><?php echo htmlspecialchars($data['judul']); ?></h2>

    <div class="row">
        <div class="col-md-11 mx-auto">

            <?php if (!empty($foto_gallery)): ?>
                <div class="penyusun-wrap">
                    <?php foreach ($foto_gallery as $i => $foto): ?>
                        <div class="penyusun-card" onclick="lbOpen(<?= $i ?>)">
                            <img src="../assets/img/uploads/<?= htmlspecialchars($foto) ?>"
                                 alt="Penyusun <?= $i + 1 ?>" loading="lazy">
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="alert alert-info text-center py-4">
                    <h5 class="mb-1">Foto belum tersedia</h5>
                    <p class="mb-0">Silakan upload foto penyusun melalui halaman Admin.</p>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>

<!-- Lightbox -->
<div id="lbModal" class="lb-modal" onclick="lbBgClose(event)">
    <span class="lb-close" onclick="lbClose()">&times;</span>
    <span class="lb-nav lb-prev" onclick="lbMove(-1, event)">&#10094;</span>
    <span class="lb-nav lb-next" onclick="lbMove(1, event)">&#10095;</span>
    <img id="lbImg" class="lb-img" src="" alt="">
</div>

<script>
const lbPhotos = <?= json_encode($foto_gallery) ?>;
let lbCur = 0;

function lbOpen(i) {
    if (!lbPhotos.length) return;
    lbCur = i;
    document.getElementById('lbImg').src = '../assets/img/uploads/' + lbPhotos[i];
    document.getElementById('lbModal').classList.add('active');
    document.body.style.overflow = 'hidden';
}
function lbClose() {
    document.getElementById('lbModal').classList.remove('active');
    document.body.style.overflow = 'auto';
}
function lbBgClose(e) { if (e.target.id === 'lbModal') lbClose(); }
function lbMove(dir, e) {
    e.stopPropagation();
    lbCur = (lbCur + dir + lbPhotos.length) % lbPhotos.length;
    document.getElementById('lbImg').src = '../assets/img/uploads/' + lbPhotos[lbCur];
}
document.addEventListener('keydown', e => {
    const m = document.getElementById('lbModal');
    if (!m.classList.contains('active')) return;
    if (e.key === 'Escape') lbClose();
    if (e.key === 'ArrowLeft')  lbMove(-1, {stopPropagation:()=>{}});
    if (e.key === 'ArrowRight') lbMove(1,  {stopPropagation:()=>{}});
});
</script>

<?php include '../footer.php'; ?>