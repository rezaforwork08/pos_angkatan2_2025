<?php
$query = mysqli_query($config, "SELECT users.name, transactions.* FROM transactions 
  LEFT JOIN users ON users.id = transactions.id_user
  ORDER BY id DESC");
// 12345, 54321
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Transaction</h5>
                <div align="right" class="mb-3">
                    <a href="?page=tambah-pos" class="btn btn-primary">Add Transaction</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Transaction</th>
                                <th>Cashier Name</th>
                                <th>Sub Total (Rp)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($rows as $index => $row): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['no_transaction'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo "Rp." .  $row['subtotal'] ?></td>
                                    <td>

                                        <a href="?page=tambah-pos&print=<?php echo $row['id'] ?>"
                                            class="btn btn-primary">Print</a>
                                        <a onclick="return confirm('Are you sure wanna delete this data??')"
                                            href="?page=tambah-POS&delete=<?php echo $row['id'] ?>"
                                            class="btn btn-danger">Delete</a>

                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>