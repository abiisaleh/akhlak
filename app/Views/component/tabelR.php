        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel <?= $title ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tabel" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <?php foreach ($field as $value) : ?>
                        <th><?= $value ?></th>
                      <?php endforeach; ?>
                    </tr>
                  </thead>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->