<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header row">
                <div class="card-title h3 col-8">Data Detail Siswa</div>
                <div class="col-4">
                    <a href="?m=siswa&s=view" class="btn btn-lg btn-primary float-end">Kembali</a>
                </div>
            </div>

            <?php
            include_once('config.php');
            $id = $_GET['id'];
            $sql = "SELECT * FROM students WHERE id='$id'";
            $result = mysqli_query($conn, $sql);
            $r = mysqli_fetch_assoc($result);
            ?>
            <div class="card-body">
                <form action="#" method="post" disabled>
                    <div class="mb-2">
                        <label for="">NIS</label>
                        <input type="text" class="form-control" name="nis" value="<?= $r['nis'] ?>" placeholder="Nomor Induk Siswa" disabled>
                    </div>
                    <div class="mb-2">
                        Nama
                        <input type="text" class="form-control" name="name" value="<?= $r['name'] ?>" placeholder="Nama Siswa" disabled>
                    </div>
                    <div class="mb-2">
                        <label for="">Jenis Kelamin: &nbsp;</label>
                        <input type="radio" name="gender" value="Laki-laki" <?= $r['gender'] == 'Laki-laki' ? 'checked' : '' ?> disabled> Laki-laki &nbsp;
                        <input type="radio" name="gender" value="Perempuan" <?= $r['gender'] == 'Perempuan' ? 'checked' : '' ?> disabled> Perempuan
                    </div>
                    <div class="mb-2">
                        Tempat Lahir
                        <input type="text" class="form-control" name="pob" value="<?= $r['pob'] ?>" placeholder="Tempat Lahir (isi dengan nama Kabupaten/Kota)" disabled>
                    </div>
                    <div class="mb-2">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="dob" value="<?= $r['dob'] ?>" placeholder="Tanggal Lahir" disabled>
                    </div>
                    <div class="mb-2">
                        <label for="">Telepon</label>
                        <input type="text" class="form-control" name="phone" value="<?= $r['phone'] ?>" placeholder="Telepon" disabled>
                    </div>
                    <div class="mb-2">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" value="<?= $r['email'] ?>" placeholder="Email" disabled>
                    </div>
                    <div class="mb-2">
                        <label for="">Kelas</label>
                        <select name="grade_id" class="form-control" disabled>
                            <option value="">Pilih Kelas</option>
                            <?php
                            include_once("config.php");
                            $sql = "SELECT * FROM grades";
                            $result = mysqli_query($conn, $sql);
                            while ($r1 = mysqli_fetch_assoc($result)) {
                                echo '<option value="'.$r1['id'].'" '.($r['grade_id'] == $r1['id'] ? 'selected' : '').'>'.$r1['grade'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="">Alamat</label>
                        <textarea name="address" class="form-control" placeholder="Alamat" disabled><?= $r['address'] ?></textarea>
                    </div>
                    <div class="mb-2">
                        <?php
                        if (isset($r['photo']) && $r['photo'] != '') { ?>
                            <img src="images/students/<?= $r['photo'] ?>" class="img-fluid" alt="<?= $r['name'] ?>" width="400px">
                        <?php } else { ?>
                            <img src="images/webpro.png" class="img-fluid" alt="Logo WebPro">
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>