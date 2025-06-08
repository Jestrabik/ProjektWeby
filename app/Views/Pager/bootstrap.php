<?php if ($pager->getPageCount() > 1): ?>
<nav>
    <ul class="pagination justify-content-center">
        <!-- Previous page link -->
        <?php if ($pager->hasPrevious()): ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="Předchozí">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link" aria-label="Předchozí">&laquo;</span>
            </li>
        <?php endif ?>

        <!-- Custom: max 8 page numbers -->
        <?php
            $links = $pager->links();
            $max = 8;
            $total = count($links);

            // Najdi index aktuální stránky
            $currentIndex = array_search(true, array_column($links, 'active'));

            // Spočítej začátek a konec okna
            $start = max(0, $currentIndex - floor($max / 2));
            $end = min($total, $start + $max);

            // Pokud jsme na konci, posuň okno zpět
            if ($end - $start < $max && $start > 0) {
                $start = max(0, $end - $max);
            }

            for ($i = $start; $i < $end; $i++):
                $link = $links[$i];
        ?>
            <li class="page-item<?= $link['active'] ? ' active' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
            </li>
        <?php endfor; ?>

        <!-- Next page link -->
        <?php if ($pager->hasNext()): ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getNext() ?>" aria-label="Další">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link" aria-label="Další">&raquo;</span>
            </li>
        <?php endif ?>
    </ul>
</nav>
<?php endif ?>