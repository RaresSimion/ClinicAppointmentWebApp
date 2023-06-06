<?php
include __DIR__ . '/../header.php';
?>

<div class="card bg-light text-center mb-4">
    <h3 class="mt-3">Edit section</h3>
    <div class="card-body">
        <form method="post" action="/management/editSection">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="form-floating">
                        <input required type="text" class="form-control" id="section" name="section"
                               value="<?= $sectionName ?>" placeholder="Section">
                        <label for="section" class="form-label">Section name</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" name="editSection">Confirm changes</button>
            <a href="/management/sections" class="btn btn-warning">Cancel</a>

        </form>
    </div>
</div>

<?php
include __DIR__ . '/../footer.php'; ?>
